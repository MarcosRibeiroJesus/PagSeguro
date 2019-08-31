var Root = "http://" + document.location.hostname + ":8181/";
var Amount = 500.0;
function iniciarSessao() {
  $.ajax({
    url: Root + "Controllers/ControllerId.php",
    type: "POST",
    dataType: "json",
    success: function(data) {
      PagSeguroDirectPayment.setSessionId(data.id);
      console.log(data.id);
    },
    complete: function() {
      listaMeiosPagamento();
    }
  });
}

// Lista os pagamentos disponíveis no Pagseguro
function listaMeiosPagamento() {
  PagSeguroDirectPayment.getPaymentMethods({
    amount: Amount,
    success: function(data) {
      $.each(data.paymentMethods.CREDIT_CARD.options, function(i, obj) {
        $(".CartaoCredito").append(
          "<div><img src=https://stc.pagseguro.uol.com.br/" +
            obj.images.SMALL.path +
            ">" +
            obj.name +
            "</div>"
        );
      });

      $(".Boleto").append(
        "<div><img src=https://stc.pagseguro.uol.com.br/" +
          data.paymentMethods.BOLETO.options.BOLETO.images.SMALL.path +
          ">" +
          data.paymentMethods.BOLETO.name +
          "</div>"
      );

      $.each(data.paymentMethods.ONLINE_DEBIT.options, function(i, obj) {
        $(".Debito").append(
          "<div><img src=https://stc.pagseguro.uol.com.br/" +
            obj.images.SMALL.path +
            ">" +
            obj.name +
            "</div>"
        );
      });
    }
  });
}

$("#NumeroCartao").on("keyup", function() {
  var NumeroCartao = $(this).val();
  var QtdCaracteres = NumeroCartao.length;

  if (QtdCaracteres == 6) {
    PagSeguroDirectPayment.getBrand({
      cardBin: NumeroCartao,
      success: function(response) {
        var BandeiraImg = response.brand.name;
        $(".BandeiraCartao").val(BandeiraImg);
        $(".BandeiraCartao").html(
          "<img src=https://stc.pagseguro.uol.com.br/public/img/payment-methods-flags/42x20/" +
            BandeiraImg +
            ".png>"
        );
        getParcelas(BandeiraImg);
      },
      error: function(response) {
        alert("Cartão não reconhecido");
        $(".BandeiraCartao").empty();
      }
    });
  }
});

//Exibe a quantidade e valores das parcelas
function getParcelas(Bandeira) {
  PagSeguroDirectPayment.getInstallments({
    amount: Amount,
    maxInstallmentNoInterest: 2,
    brand: Bandeira,
    success: function(response) {
      $.each(response.installments, function(i, obj) {
        $.each(obj, function(i2, obj2) {
          var NumberValue = obj2.installmentAmount;
          var Number = "R$ " + NumberValue.toFixed(2).replace(".", ",");
          var NumberParcelas = NumberValue.toFixed(2);
          $("#QtdParcelas")
            .show()
            .append(
              "<option value='" +
                obj2.quantity +
                "' title='" +
                NumberParcelas +
                "'>" +
                obj2.quantity +
                " parcelas de " +
                Number +
                "</option>"
            );
        });
      });
    }
  });
}

// Pegar Token
$("#CVV").on("blur", function() {
  getTokenCard();
});

//Pegar o valor da parcela
$("#QtdParcelas").on("change", function() {
  var ValueSelected = document.getElementById("QtdParcelas");
  $("#ValorParcelas").val(
    ValueSelected.options[ValueSelected.selectedIndex].title
  );
});

//Obter o token do cartão de crédito
function getTokenCard() {
  PagSeguroDirectPayment.createCardToken({
    cardNumber: $("#NumeroCartao").val(),
    brand: $("#BandeiraCartao").val(),
    cvv: $("#CVV").val(),
    expirationMonth: $("#MesValidade").val(),
    expirationYear: $("#AnoValidade").val(),
    success: function(response) {
      $("#TokenCard").val(response.card.token);
    }
  });
}

//Pega o hash do cartão
$("#Form1").on("submit", function(event) {
  event.preventDefault();
  PagSeguroDirectPayment.onSenderHashReady(function(response) {
    $("#HashCard").val(response.senderHash);

    if (response.status == "success") {
      $("#Form1").trigger("submit");
    }
  });
});

iniciarSessao();
