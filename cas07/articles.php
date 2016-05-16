<html>
    <head>
        <title>Articles</title>
    </head>
    <body>
        <?php
            $articles = array(
                "a" => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus mauris erat, accumsan eget mollis in, sodales vitae ex. Mauris vulputate tincidunt quam vel sagittis. Vestibulum a erat nulla. Phasellus egestas suscipit libero, quis scelerisque justo convallis eget. Praesent in turpis vitae ligula faucibus rutrum. Pellentesque eget convallis neque. Pellentesque pharetra nisi eu neque cursus eleifend. Donec molestie vitae felis vel aliquam. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum eget maximus metus.',
                "b" => 'Ut enim libero, pulvinar eget consectetur sit amet, interdum vel turpis. Nulla facilisi. Nulla placerat lectus id nisi ullamcorper, ultricies tincidunt velit ultricies. Sed rhoncus ex dui, nec feugiat orci eleifend a. Nunc augue velit, accumsan nec luctus vitae, vulputate fringilla enim. Nunc vel auctor turpis. In rhoncus, est non vestibulum fermentum, tellus purus sollicitudin purus, quis consectetur sapien nibh eu mi. Nulla non sem sed odio sollicitudin finibus a a magna. Ut et leo eu eros vulputate porttitor id sed elit. Nulla ut metus a elit venenatis varius ultrices vel magna. Ut convallis semper dui. Mauris sit amet rutrum magna, nec vestibulum metus. Quisque quam nunc, sodales sit amet leo nec, rhoncus mattis libero. Integer ut ornare mauris, sed ornare diam.',
                "c" => 'Vestibulum tempus nunc in augue varius, a suscipit leo placerat. Praesent convallis convallis lorem ac egestas. Fusce eu dolor id ligula porttitor congue sed eget lacus. Proin auctor et ex quis pulvinar. Suspendisse urna sapien, tristique ac faucibus id, aliquet non quam. Maecenas dapibus sapien vel imperdiet facilisis. Quisque sodales quis nisi quis dapibus. Nullam feugiat imperdiet iaculis. Integer porttitor metus nec purus vehicula, pellentesque aliquam nulla pellentesque. In mattis magna vitae auctor viverra. Duis sed nulla a tortor mattis porta. Fusce dictum laoreet orci eget consectetur. Nulla eget tincidunt leo. Fusce lobortis dolor augue, vitae dictum massa aliquam imperdiet.'
            );
            //$_GET['artikl'] ni dava 0,1 ili 2 sto soodvetno ni ja dava
            //pozicijata (klucot) na elementot sto sakame da go procitame
            if(isset($_GET['artikl']) && isset($articles[ $_GET['artikl'] ])) {
                echo "<p>" . $articles[$_GET['artikl']] . "</p>";
            }

        ?>
    </body>
</html>