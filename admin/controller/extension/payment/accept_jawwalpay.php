<?php
if (!trait_exists('AcceptController', false)) {
    include_once 'Accept/AcceptController.php';
}

class ControllerExtensionPaymentAcceptJawwalpay extends Controller
{
    /**
     * @var array
     */
    private $error = [];

    use AcceptController;

    /**
     * Gateway name for humans
     * @var string
     */
    protected $gateway = 'Jawwalpay';
    /**
     * Gateway name for system
     * @var string
     */
    protected $gateway_file = 'accept_jawwalpay';
    /**
     * Gateway fields
     * @var array
     */
    protected $fields = [
        'payment_accept_jawwalpay_api',
        'payment_accept_jawwalpay_hmac',
        'payment_accept_jawwalpay_int',
        'payment_accept_jawwalpay_status',
        'payment_accept_jawwalpay_method_name',
        'payment_accept_jawwalpay_sort_order',
        'payment_accept_jawwalpay_iframe',
        'payment_accept_jawwalpay_iframe_css',
        'payment_accept_jawwalpay_allow_debug',
    ];

    /**
     * Install tokens card into the database.
     *
     * @return void
     */
    public function install()
    {
        $this->db->query('
			CREATE TABLE `' . DB_PREFIX . "accept_jawwalpay_tokens` (
				`id`  INT(11) NOT NULL AUTO_INCREMENT,
				`customer_id` BIGINT(20) NOT NULL,
				`card_subtype` VARCHAR(56) DEFAULT '' NOT NULL,
				`token` VARCHAR(56) DEFAULT '' NOT NULL,
				`masked_pan` VARCHAR(19) DEFAULT '' NOT NULL,
				KEY `customer_id` (`customer_id`),
				PRIMARY KEY `id` (`id`)
			) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
		");
    }

    /**
     * Uninstall tokens card from the database.
     *
     * @return void
     */
    public function uninstall()
    {
        $this->db->query('DROP TABLE IF EXISTS `' . DB_PREFIX . 'accept_jawwalpay_tokens`;');
    }
}
