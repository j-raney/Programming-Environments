<div id="addLinks">
    <hr>
    <h3>Product Description:</h3>
    <form action="../wp-content/plugins/LinkOrganizer/addLink.php" method="post">
        <div>
            <h3>Link URL</h3>
            <input type='text' name='URL'>
            <h3>Link Name:</h3>
            <input type='text' name='Name'>
            <h3>Link Description:</h3>
                <?php
                $content = '';
                $editor_id = 'Description';
                $settings = array( 'editor_height' => 200, "drag_drop_upload" => true);
                wp_editor( $content, $editor_id, $settings );
                ?>
            <input type="submit" value="Add Link">
        </div>
    </form>
    <hr>
</div>