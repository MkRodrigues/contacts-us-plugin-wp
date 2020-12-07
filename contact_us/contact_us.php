<?php
/* 
* Plugin Name: Contact Us
* Plugin URI: https://sp.senac.br
* Description: Plugin para criação de Formulário de Contato
* Version: 0.0.1
* Author: Mikael Assis Silva
* Author URI: https://google.com
* Licence: CC BY 
*/

if (!defined('WPINC')) {
    die;
}

// Cria tabela no banco
register_activation_hook(__FILE__, 'criar_tabela_contactus');
function criar_tabela_contactus()
{
    global $wpdb;

    $wpdb->query("CREATE TABLE {$wpdb->prefix}contato (id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY, nome VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, assunto VARCHAR(255) NOT NULL, mensagem VARCHAR(255) NOT NULL)");

    $page_title = 'Fale Conosco';

    $page = get_page_by_title($page_title);

    if (!$page) {

        $post = [
            'post_title' => $page_title,
            'post_content' => '[contact_us]',
            'post_status' => 'publish',
            'post_type' => 'page',
            'comment_status' => 'closed',
            'ping_status' => 'closed',
            'post_category' => [1]
        ];

        $page_id = wp_insert_post($post);
    } else {

        $page->post_status = 'publish';
        $page->post_content = '[contact_us]';
    }
}

// Exclui tabela ao desativar plugin
register_deactivation_hook(__FILE__, 'destruir_tabela');
function destruir_tabela()
{
    global $wpdb;
    $wpdb->query("DROP TABLE {$wpdb->prefix}contato");
}


// Formulário para contato
add_shortcode('contact_us', 'contacts_us_form');
function contacts_us_form()
{
    global $wpdb;

    $wpdb->query("INSERT INTO {$wpdb->prefix}contato (nome, email, assunto, mensagem) VALUES ('{$_POST['nome']}', '{$_POST['email']}', '{$_POST['assunto']}', '{$_POST['mensagem']}')");

    ob_start();

    include 'contact_us_view.php';

    return ob_get_clean();
}

// Gera item no menu
add_action('admin_menu', 'gera_item_no_menu');
function gera_item_no_menu()
{
    add_menu_page('Configurações do Plugin SGBD', 'Contact Us', 'administrator', 'Contact Us', 'contacts_us', 'dashicons-email ');
}

function contacts_us()
{
    global $wpdb;
    $mensagens = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}contato");
    require 'contact_us_admin.php';
}
