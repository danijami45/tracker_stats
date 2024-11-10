<html>
    <head>
    <link rel="stylesheet" href="assets/css/statsstyle.css">
    </head>
    <body>

        <h2>Visitors traffic tracker.</h2>
        <!-- visitor traffic tracker table -->
        <div class="table-container">
            <table>
            <tr>
                <th>#</th>
                <th>Website</th>
                <th>I.P Address</th>
                <th>Logged Date</th>
            </tr>
            <?php for ($i=0; $i < count($visitors); $i++) { ?>
            <tr>
                <td><?php echo ($i+1);?></td>
                <td><?php echo $visitors[$i]['site_url'];?></td>
                <td><?php echo $visitors[$i]['ip_address'];?></td>
                <td><?php echo $visitors[$i]['created_at'];?></td>
            </tr>
            <?php }?>

            </table>
        </div>  

    </body>
</html>
