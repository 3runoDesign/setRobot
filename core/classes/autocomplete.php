<?php

class AutoComplete
{

    private static $action;
    private static $type;

    public function __construct(array $type) {
        self::$action = 'my_autocomplete';
        self::$type   = $type;

        add_action('init', array( __CLASS__, 'init'));
    }

    public static function init()
    {
        //Register style - you can create your own jQuery UI theme and store it in the plug-in folder
        // wp_register_style('my-jquery-ui','http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css');
        add_action('get_search_form', array( __CLASS__, 'get_search_form' ));
        add_action('wp_ajax_'. self::$action, array( __CLASS__, 'autocomplete_suggestions' ));
        add_action('wp_ajax_nopriv_'. self::$action, array( __CLASS__, 'autocomplete_suggestions' ));
    }

    public static function get_search_form($form)
    {
        wp_enqueue_script('jquery-ui-autocomplete');
        wp_enqueue_style('my-jquery-ui');

        add_action('wp_print_footer_scripts', array( __CLASS__, 'print_footer_scripts' ), 11);

        return $form;
    }

    public static function print_footer_scripts()
    {
        ?>
    <script type="text/javascript">
    jQuery(document).ready(function ($){
        var inputSearch = $("#s");
            ajaxurl = '<?php echo admin_url('admin-ajax.php');?>',
            ajaxaction = '<?php echo self::$action ?>'
            delay = (function(){
                var timer = 0;
                return function(callback, ms){
                clearTimeout (timer);
                timer = setTimeout(callback, ms);
                };
            })();

            inputSearch.autocomplete({
                delay: 400,
                minLength: 0,
                source: function(req, response){
                    // $.getJSON(ajaxurl+'?callback=?&action='+ajaxaction, req, response);
                    $.ajax({
                        'url': ajaxurl+'?callback=?&action='+ajaxaction,
                        'data': req,
                        'method': "GET",
                        'dataType': "json",
                        'success': function(data) {
                            return response(data);
                        }
                    });
                },
                select: function(event, ui) {
                    // window.location.href = ui.item.link;
                    console.log( ui.item.excerpt );
                },
            }).data("ui-autocomplete")._renderItem = function (ul, item) {
                return $("<li></li>")
                        .data("item.autocomplete", item)
                        .append(
                            // "<a>" + item.label + "</a>"
                            "<h1>" + item.label + "</h1><p>" + item.excerpt + "</p>"
                            )
                        .appendTo(ul);
            };
    });
    </script>

    <?php

    }

    public static function autocomplete_suggestions()
    {
        $posts = get_posts(array(
            's'         => trim(esc_attr(strip_tags($_REQUEST['term']))),
            'post_type' => self::$type,
        ));

        $suggestions = array();

        // global $post;

        foreach ($posts as $post):

            setup_postdata($post);

            $suggestion = array();
            $suggestion['label']   = esc_html($post->post_title);
            $suggestion['link']    = get_permalink();
            $suggestion['excerpt'] = esc_html(wp_trim_words($post->post_content, 15));

            $suggestions[]= $suggestion;
        endforeach;

        $response = $_GET["callback"] . "(" . json_encode($suggestions) . ")";
        echo $response;
        exit;
    }
}

$searchCustom = new AutoComplete(['post']);
