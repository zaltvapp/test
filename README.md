# iptv-whmcs-module
IPTV Whmcs module ZalTV APP IPTV Web Player Canais no Brasil

Instalação:

Envie a pasta modules para o diretório principal do seu WHMCS.

Crie um produto com a opção ''Produtos/Serviços'' na aba modules, selecione o módulo zaltv ou brazuca.
Em login informe o seu login do Painel ZalTV/Brazuca e em senha informe a sua senha do painel.

Email Template (Email padrão de envio automático):

Exemplo:

---------------------------------------------------------------------------------------
Caro {$client_name},

Obrigado por contratar com a ZalTV, seu plano de TV está ativo e você pode acessar com os dados abaixo:

Links de acesso ao navegador e link da lista para que você possa usar em Apps de IPTV:

Acesso Pelo Navegador: http://brazuca.link/{$service_custom_field_brazucatoken}

Lista IPTV: http://brazuca.link/hls/{$service_custom_field_brazucatoken}

EPG: http://brazuca.link/xmltv/{$service_custom_field_brazucatoken}

Serviço: {$service_product_name}
Forma de Pagamento: {$service_payment_method}
Valor: {$service_recurring_amount}
Ciclo de Pagamento: {$service_billing_cycle}
Próximo Vencimento: {$service_next_due_date}

Obrigado por nos escolher!

---------------------------------------------------------------------------------------

Criado o template de email selecione o padrão de email para esse produto, o sistema vai criar automaticamente após a confirmação de pagamento se assim preferir e suspender caso não seja renovado, será capaz de reativar também após a confirmação de pagamento.

Um módulo super simples para revenda IPTV com WHMCS para canais no Brasil.

Lembrando que para usar o módulo você precisa de um plano de revenda IPTV ZalTV, os créditos são pagos apenas uma vez e não expiram ou seja, você tem tempo para vender e solicitar mais se assim desejar.

Obrigado!
