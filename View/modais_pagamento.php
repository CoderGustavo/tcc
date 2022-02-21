<div class="modal fade" id="modal_pix" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg-dark">
            <div class="modal-body text-center">
                <h3 class="modal-title mb-3" style="font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;">Pagamento pix</h3>
                <form action="<?= url("checkout/pagamento") ?>" method="post" style="position: absolute; right: 0; top: 0; margin: 1rem;">
                    <button type="submit" class="btn text-danger"><i class="fas fa-times"></i></button>
                </form>
                <p class="text-danger">Faça o pagamento e aguarde na página! <br> NÂO RECARREGUE A PÁGINA</p>
                <img src="data:image/jpeg;base64, <?php echo $response["qrcode"] ?>" alt="" width="100%">
                <div class="d-flex mt-4">
                    <p id="codigopix" class="text-truncate m-0">
                        <?php echo $response["pixcode"]?>
                    </p>
                    <a href="#" onclick="copiarTexto()" class="text-primarycolor"><i class="fas fa-copy"></i></a>
                </div>
                <p class="copiado text-success"></p>
                <p>
                    checagem de pagamento <span class="qtdvez">1</span> / 5 <br>
                    <span class="text-primarycolor"><span class="cronometro">60</span> segundos</span>
                </p>
                <button class="btn btn-primarycolor rounded-pill">Checar pagamento</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modal_cpf_pix">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg-dark">
            <div class="modal-body text-center">
                <h3 class="modal-title mb-3" style="font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;">Pagamento no Pix</h3>
                <form action="<?= url("checkout/pagamento/pix") ?>" method="post">
                    <div>
                        <label for="#cpf" class="text-left w-100">
                            CPF: 
                            <input type="text" name="cpf" class="form-control" placeholder="Seu CPF" required>
                        </label>
                    </div>
                    <button type="submit" class="btn btn-primarycolor rounded-pill mb-3">Confirmar e gerar QrCode</button>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modal_credito">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg-dark">
            <div class="modal-body text-center">
                <h3 class="modal-title mb-3" style="font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;">Pagamento no cartão de crédito</h3>
                <form id="form-checkout" method="post" action="<?= url("checkout/pagamento/credito") ?>">
                    <div>
                        <label for="form-checkout__identificationNumber" class="w-100">
                            CPF:
                            <input type="text" name="identificationNumber" id="form-checkout__identificationNumber" class="form-control"/>
                        </label>
                    </div>
                    <div>
                        <label for="form-checkout__cardholderName" class="w-100">
                            Nome no cartão:
                            <input type="text" name="cardholderName" id="form-checkout__cardholderName" class="form-control"/>
                        </label>
                    </div>
                    <div class="d-flex">
                        <label for="form-checkout__cardNumber" class="w-75">
                            Nº do cartão:
                            <input type="text" name="cardNumber" id="form-checkout__cardNumber" class="form-control"/>
                        </label>
                        <label for="form-checkout__securityCode" class="w-25">
                            CVC:
                            <input type="text" name="securityCode" id="form-checkout__securityCode" class="form-control"/>
                        </label>
                    </div>
                    
                     <select name="identificationType" id="form-checkout__identificationType" style="display: none"></select>
                    <select name="issuer" id="form-checkout__issuer" type="hidden" class="form-control"></select>
                    <div>
                        <p class="m-0">Vencimento do cartão:</p>
                        <label for="form-checkout__cardExpirationMonth">
                            Mês:
                            <input type="text" name="cardExpirationMonth" id="form-checkout__cardExpirationMonth" class="form-control"/>
                        </label>
                        
                        <label for="form-checkout__cardExpirationYear">
                            Ano:
                            <input type="text" name="cardExpirationYear" id="form-checkout__cardExpirationYear" class="form-control"/>
                        </label>
                    </div>
                    <div>
                        <label for="form-checkout__installments" class="w-100">
                            parcelas
                            <select name="installments" id="form-checkout__installments" class="form-control"></select>
                        </label>
                    </div>
                    <button type="submit" id="form-checkout__submit" class="btn btn-primarycolor rounded-pill mb-3">Pagar</button>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modal_balcao">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg-dark">
            <div class="modal-body text-center">
                <h3 class="modal-title mb-3" style="font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;">Pagamento no Pix</h3>
                <form action="<?= url("checkout/pagamento/balcao") ?>" method="post">
                    <p>Você deseja mesmo retirar seu pedido no balcão?</p>
                    <button type="submit" class="btn btn-primarycolor rounded-pill mb-3">sim, confirmar pedido!</button>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modal_entrega">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg-dark">
            <div class="modal-body text-center">
                <h3 class="modal-title mb-3" style="font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;">Pagamento no Pix</h3>
                <form action="<?= url("checkout/pagamento/entrega") ?>" method="post">
                    <p>Você deseja mesmo pagar na entrega?</p>
                    <button type="submit" class="btn btn-primarycolor rounded-pill mb-3">sim, confirmar pedido!</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://sdk.mercadopago.com/js/v2"></script>
<script>
    const mp = new MercadoPago('<?php echo PUBLIC_KEY_MP ?>');
    const cardForm = mp.cardForm({
        amount: "<?php echo $soma?>",
        autoMount: true,
        form: {
            id: "form-checkout",
            cardholderName: {
                id: "form-checkout__cardholderName",
                placeholder: "Titular do cartão",
            },
            cardNumber: {
                id: "form-checkout__cardNumber",
                placeholder: "Número do cartão",
            },
            cardExpirationMonth: {
                id: "form-checkout__cardExpirationMonth",
                placeholder: "Mês de vencimento",
            },
            cardExpirationYear: {
                id: "form-checkout__cardExpirationYear",
                placeholder: "Ano de vencimento",
            },
            securityCode: {
                id: "form-checkout__securityCode",
                placeholder: "Código de segurança",
            },
            installments: {
                id: "form-checkout__installments",
                placeholder: "Parcelas",
            },
            identificationType: {
                id: "form-checkout__identificationType",
                placeholder: "Tipo de documento",
            },
            identificationNumber: {
                id: "form-checkout__identificationNumber",
                placeholder: "Número do documento",
            },
            issuer: {
                id: "form-checkout__issuer",
                placeholder: "Banco emissor",
            },
        },
        callbacks: {
            onFormMounted: error => {
            if (error) return console.warn("Form Mounted handling error: ", error);
            },
            onFetching: (resource) => {
            },
        },
    });
</script>

<script>
    let copiarTexto = () => {
        //O texto que será copiado
        const texto = document.querySelector("#codigopix").innerHTML;
        //Cria um elemento input (pode ser um textarea)
        let inputTest = document.createElement("input");
        inputTest.value = texto;
        //Anexa o elemento ao body
        document.body.appendChild(inputTest);
        //seleciona todo o texto do elemento
        inputTest.select();
        //executa o comando copy
        //aqui é feito o ato de copiar para a area de trabalho com base na seleção
        document.execCommand('copy');
        //remove o elemento
        document.body.removeChild(inputTest);
        document.querySelector(".copiado").innerHTML = "copiado!";
        setTimeout(function(){
            document.querySelector(".copiado").innerHTML = " ";
        },3000);
    };
</script>
<script>
    let valcronometro = parseInt(document.querySelector(".cronometro").innerHTML);
    let qtdvez = parseInt(document.querySelector(".qtdvez").innerHTML);
    function seg(ini){
        valcronometro = ini;
        setInterval(() => {
            if(valcronometro > 0){
                document.querySelector(".cronometro").innerHTML = valcronometro;
                valcronometro -= 1;
            }else{
                vez();
            }
        }, 1000);
    }
    function vez(){
        if(qtdvez <= 5){
            $.post("/tcc/checkout/pagamento/checkPagamento", {
                nome: "gustavo"
            },function(msg){
                console.log(msg);
                if(msg == "approved"){
                    document.location.replace("/tcc/checkout/pagamento/aprovado/<?php echo $idpedido ?>");
                }else{
                    qtdvez += 1;
                    document.querySelector(".qtdvez").innerHTML = qtdvez
                    seg(60);
                }
            })
        }else{
            document.location.replace("/tcc/delivery");
        }
    }
    seg(60);
</script>