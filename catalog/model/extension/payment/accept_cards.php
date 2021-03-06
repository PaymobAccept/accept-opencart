<?php
if (!trait_exists('AcceptModel', false)) {
    include_once 'Accept/AcceptModel.php';
}

class ModelExtensionPaymentAcceptCards extends Model
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
            'code'       => 'accept_cards',
            'title'      => ($this->config->get('payment_accept_cards_method_name')) ? $this->config->get('payment_accept_cards_method_name') : 'Credit/Debit Cards',
            'terms'      => '',
            'sort_order' => $this->config->get('payment_accept_cards_sort_order'),
        ];

        return $method_data;
    }
}
