<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>API Pagseguro</title>
    <link rel="stylesheet" href="Libraries/Stylesheet.css">

    <!-- NEW TEMPLATE -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link rel="stylesheet" href="Libraries/payment.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>

    </form>

    <!-- <div class="BandeiraCartao"></div> -->

    <!-- <div class="CartaoCredito">
        <div class="Titulo">Cartão de Crédito</div>
    </div> -->
    <!-- <div class="Boleto">
        <div class="Titulo">Boleto</div>
    </div> -->
    <!-- <div class="Debito">
        <div class="Titulo">Débito Online</div>
    </div>  -->


    <main class="page payment-page">
        <section class="payment-form dark">
            <div class="container">
                <div class="block-heading">
                    <h2>Pagamento</h2>
                    <p>Agradecemos por você ajudar o nosso sonho se tornar realidade.</p>
                </div>
                <form id="Form1" name="Form1" method="post" action="Controllers/ControllerPedido.php">
                    <div class="products">
                        <h3 class="title">Checkout</h3>
                        <div class="item">
                            <span class="price">R$ 250</span>
                            <p class="item-name">Produto 1</p>
                            <p class="item-description">Lorem ipsum dolor sit amet</p>
                        </div>
                        <div class="item">
                            <span class="price">R$ 250</span>
                            <p class="item-name">Produto 2</p>
                            <p class="item-description">Lorem ipsum dolor sit amet</p>
                        </div>
                        <div class="total">Total<span class="price">R$ 500</span></div>
                    </div>
                    <div class="card-details">
                        <h3 class="title">Dados do usuário</h3>
                        <div class="row">
                            <div class="form-group col-sm-8">
                                <label for="">Nome Completo</label>
                                <input id="card-holder" type="text" id="NomeComprador" name="NomeComprador" class="form-control" placeholder="Seu Nome" aria-label="Card Holder" aria-describedby="basic-addon1">
                            </div>
                            <div class="form-group col-sm-4">
                                <label for="">CPF</label>
                                <div class="input-group expiration-date">
                                    <input id="CPFComprador" name="CPFComprador" maxlength="11" class="form-control" placeholder="Seu CPF" aria-describedby="basic-addon1">
                                </div>
                            </div>
                            <div class="form-group col-sm-2">
                                <label for="">DDD </label> <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="right" title="O código DDD da sua área"></i>
                                <input id="DDDComprador" name="DDDComprador" maxlength="2" type="text" class="form-control" placeholder="DDD" aria-label="Card Holder" aria-describedby="basic-addon1">
                            </div>
                            <div class="form-group col-sm-4">
                                <label for="">Telefone </label>
                                <input type="text" id="TelefoneComprador" name="TelefoneComprador" maxlength="9" class="form-control" placeholder="Número de telefone" aria-label="Card Holder" aria-describedby="basic-addon1">
                            </div>
                        </div>
                    </div>

                    <div class="card-details">
                        <h3 class="title">Dados da Entrega</h3>
                        <div class="row">
                            <div class="form-group col-sm-12">
                                <label for="">Endereco </label>
                                <input type="text" id="Endereco" name="Endereco" class="form-control" aria-label="Card Holder" aria-describedby="basic-addon1">
                            </div>

                            <div class="form-group col-sm-4">
                                <label for="">CEP </label>
                                <div class="input-group expiration-date">
                                    <input type="text" id="CEP" name="CEP" maxlength="8" class="form-control" aria-describedby="basic-addon1">
                                </div>
                            </div>
                            <div class="form-group col-sm-4">
                                <label for="">Número </label>
                                <input type="text" id="Numero" name="Numero" class="form-control" aria-label="Card Holder" aria-describedby="basic-addon1">
                            </div>
                            <div class="form-group col-sm-4">
                                <label for="">UF </label>
                                <input type="text" id="UF" name="UF" maxlength="2" class="form-control" aria-label="Card Holder" aria-describedby="basic-addon1">
                            </div>

                            <div class="form-group col-sm-6">
                                <label for="">Cidade </label>
                                <input type="text" id="Cidade" name="Cidade" class="form-control" aria-label="Card Holder" aria-describedby="basic-addon1">
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="">Bairro </label>
                                <input type="text" id="Bairro" name="Bairro" class="form-control" aria-label="Card Holder" aria-describedby="basic-addon1">
                            </div>

                            <div class="form-group col-sm-12">
                                <label for="">Complemento </label>
                                <input type="text" id="Complemento" name="Complemento" class="form-control" aria-label="Card Holder" aria-describedby="basic-addon1">
                            </div>
                        </div>
                    </div>

                    <div class="card-details">
                        <h3 class="title">Detalhes do Cartão de Crédito</h3>
                        <input type="text" id="TokenCard" name="TokenCard">
                        <input type="text" id="HashCard" name="HashCard">
                        <div class="row">
                            <div class="form-group col-sm-12">
                                <label for="card-holder">Nome no Cartão</label>
                                <input type="text" id="NomeCartao" name="NomeCartao" class="form-control" placeholder="Nome impresso no cartão" aria-label="Card Holder" aria-describedby="basic-addon1">
                            </div>

                            <div class="form-group col-sm-6">
                                <label for="">CPF do dono do cartão</label>
                                <div class="input-group expiration-date">
                                    <input type="text" id="CPFCartao" name="CPFCartao" maxlength="11" class="form-control" placeholder="Seu CPF" aria-describedby="basic-addon1">
                                </div>
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="">Data Expiração</label>
                                <div class="input-group expiration-date">
                                    <input type="text" id="MesValidade" name="MesValidade" maxlength="2" class="form-control" placeholder="MM" aria-label="MM" aria-describedby="basic-addon1">
                                    <span class="date-separator">/</span>
                                    <input type="text" id="AnoValidade" name="AnoValidade" maxlength="4" class="form-control" placeholder="AAAA" aria-label="AAAA" aria-describedby="basic-addon1">
                                </div>
                            </div>

                            <div class="form-group col-sm-8">
                                <label for="card-number">Número do Cartão </label> <span class="BandeiraCartao"></span>
                                <input id="NumeroCartao" name="NumeroCartao" type="text" class="form-control" placeholder="Número do cartão" aria-label="Card Holder" aria-describedby="basic-addon1">
                                <input type="hidden" id="BandeiraCartao" name="BandeiraCartao">
                            </div>
                            <div class="form-group col-sm-4">
                                <label for="cvvv">CVV</label> <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="right" title="Os 3 números no verso do cartão"></i>
                                <input type="text" id="CVV" name="CVV" maxlength="3" class="form-control" placeholder="CVV" aria-label="Card Holder" aria-describedby="basic-addon1">
                            </div>

                            <div class="form-group col-sm-12">
                                <label for="card-number">Parcelas </label>
                                <select class="form-control" name="QtdParcelas" id="QtdParcelas" aria-describedby="basic-addon1">
                                    <option value="">Selecione</option>
                                </select>
                                <input class="form-control" type="hidden" id="ValorParcelas" name="ValorParcelas">
                            </div>
                            <div class="form-group col-sm-12">
                                <input id="BotaoComprar" name="BotaoComprar" type="submit" class="btn btn-primary btn-block" value="Efetuar Pagamento">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </main>


    <script src="Libraries/zepto.min.js"></script>
    <script src="Libraries/Javascript.js"></script>
    <script type="text/javascript" src="https://stc.sandbox.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js"></script>

    <!-- NEW STYLE -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</body>

</html>