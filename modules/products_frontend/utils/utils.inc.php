<?php
function paint_template_error($message) {
    $log = Log::getInstance();
    $log->add_log_general("error paint_template_error", "products", "response" . http_response_code()); //$text, $controller, $function
    $log->add_log_products("error paint_template_error", "", "products", "response" . http_response_code()); //$msg, $username = "", $controller, $function

    print( "<section id='error' class='container'>");
    print('<div id="page">');

    print('<div id="header" class="status' . http_response_code() . '>');

    if (isset($message) && !empty($message)) {
        print( '<h1>ERROR ' . http_response_code() . ' - ' . $message . '</h1>');
    }

    print('</div>');
    print('<div id="content">');
    print('<h2>The following error occurred:</h2>');
    print('<p>The requested URL was not found on this server.</p>');
    print('<P>Please check the URL or contact the webmaster.</p>');
    print('</div>');
    print('<div id="footererr">');
    print('<p>Powered by <a href="http://www.ispconfig.org">ISPConfig</a></p>');
    print('</div>');
    print('</div>');
    print('</section>');

}

function paint_template_products($arrData) {
    print ("<script type='text/javascript' src='". PRODUCTS_JS_PATH. "/modal_products.js'></script>");
    print('<section id="services" >');
    print('<div class="container">');

    print('<div class="table-display">');

    if (isset($arrData) && !empty($arrData)) {
        $i = 0;
        foreach ($arrData as $product) {
            $i++;
            if (count($arrData) % 2 !== 0 && i >= count($arrData))
                print( '<div class="odd_prod">');
            else {
                if ($i % 2 != 0)
                    print( '<div class="table-row">');
                else
                    print('<div class="table-separator"></div>');
            }
            print('<div class="table-cell">');

            print ("<div class='id_prod' id='".$product['cod_prod']."'>");
            print('<div class="pull-left">');
            print('<img src="' . $product['avatar'] . '" class="icon-md" height="80" width="80">');
            print('</div>');
            print('<div class="media-body">');
            print('<h3 class="name_product">' . $product['name_prod'] . '</h3>');
            print('<p>' . $product['description'] . '</p>');
            print('<h5> <strong>Price:&nbsp' . $product['price'] . '</strong><strong>€</strong> </h5>');
            print('</div>');
            print('</div>');
            print('<br>');


            print('</div>');
            if (count($arrData) % 2 !== 0 && i >= count($arrData))
                print( '</div>');
            else {
                if ($i % 2 == 0)
                    print('</div> <br>');
            }
        }
    }
    print ("</div>");
    print ("</div>");
    print ("</section>");
}
function paint_template_search($message) {
    $log = Log::getInstance();
    $log->add_log_general("error paint_template_search", "products", "response " . http_response_code()); //$text, $controller, $function
    $log->add_log_products("error paint_template_search", "", "products", "response " . http_response_code()); //$msg, $username = "", $controller, $function

    print ("<section> \n");
    print ("<div class='container'> \n");
    print ("<div class='row text-center pad-row'> \n");

    print ("<h2>" . $message . "</h2> \n");
    print ("<br><br><br><br> \n");

    print ("</div> \n");
    print ("</div> \n");
    print ("</section> \n");
}
