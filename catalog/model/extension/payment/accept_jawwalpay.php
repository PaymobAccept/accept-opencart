<?php
if (!trait_exists('AcceptModel', false)) {
    include_once 'Accept/AcceptModel.php';
}

class ModelExtensionPaymentAcceptJawwalpay extends Model
{

    use AcceptModel;

    /**
     * @param  $address
     * @param  $total
     * @return mixed
     */
    public function getMethod($address, $total)
    {
        $method_data = [
            'code'       => 'accept_jawwalpay',
            'title'      => ($this->config->get('payment_accept_jawwalpay_method_name')) ? $this->config->get('payment_accept_jawwalpay_method_name') : 'Jawwal Pay',
            'terms'      => '',
            'sort_order' => $this->config->get('payment_accept_jawwalpay_sort_order'),
        ];

        return $method_data;
    }
}
