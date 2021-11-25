<div class="modal fade" id="modal_pix">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg-dark">
            <div class="modal-body text-center">
                <h3 class="modal-title mb-3" style="font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;">Pagamento pix</h3>
                <p class="text-danger">Faça o pagamento e aguarde na página! <br> NÂO RECARREGUE A PÁGINA</p>
                <img src="data:image/jpeg;base64, <?php echo $response["qrcode"] ?>" alt="" width="100%">
                <div class="d-flex mt-4">
                    <p id="codigopix" class="text-truncate">
                        <?php echo $response["pixcode"]?>
                    </p>
                    <a href="#" onclick="copiarTexto()" class="text-primarycolor"><i class="fas fa-copy"></i></a>
                </div>
                <p class="copiado text-success"></p>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal_credito">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg-dark">
            <div class="modal-body text-center">
                <h3 class="modal-title mb-3" style="font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;">Pagamento no cartão de crédito</h3>
                <form id="form-checkout">
                    <progress value="0" class="progress-bar m-auto">Carregando...</progress>
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
                    <select name="identificationType" type="hidden" id="form-checkout__identificationType"></select>
                    <select name="issuer" id="form-checkout__issuer" type="hidden" class="form-control"></select>
                    <div>
                        <p class="m-0">Expiração do cartão:</p>
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

<script src="https://sdk.mercadopago.com/js/v2"></script>
<script>
    const mp = new MercadoPago('<?php echo PUBLIC_KEY_MP ?>');
    const cardForm = mp.cardForm({
        amount: "100.5",
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
            console.log("Form mounted");
            },
            onSubmit: event => {
            event.preventDefault();

            const {
                paymentMethodId: payment_method_id,
                issuerId: issuer_id,
                cardholderEmail: email,
                amount,
                token,
                installments,
                identificationNumber,
                identificationType,
            } = cardForm.getCardFormData();

            fetch("/tcc/checkout/pagamento/pagar", {
                method: "POST",
                headers: {
                "Content-Type": "application/json",
                },
                body: JSON.stringify({
                token,
                issuer_id,
                payment_method_id,
                transaction_amount: Number(amount),
                installments: Number(installments),
                description: "Descrição do produto",
                    payer: {
                        email,
                        identification: {
                        type: identificationType,
                        number: identificationNumber,
                        },
                    },
                }),
            });
            },
            onFetching: (resource) => {
            console.log("Fetching resource: ", resource);

            // Animate progress bar
            const progressBar = document.querySelector(".progress-bar");
            progressBar.removeAttribute("value");

            return () => {
                progressBar.setAttribute("value", "0");
            };
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