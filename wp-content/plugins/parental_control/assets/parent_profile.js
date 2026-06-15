jQuery(document).ready(function($) {
    $('#pcpc_register_child').click(function(e) {
        e.preventDefault();

        $.ajax({
            url: ajaxurl,
            type: 'POST',
            data: {
                action: 'pcpc_load_shortcode',
                shortcode: '[pcpc_register_child]'
            },
            success: function(response) {
                if (!is_user_logged_in() || !current_user_can('pcpc_parent')) {
                    wp_redirect(home_url());
                    exit;
                }
                $current_user = wp_get_current_user();
                // Replace the link with the loaded content
                $('#pcpc_register_child').replaceWith(response);
            },
            error: function(error) {
                console.error(error);
            }
        });
    });

    $('.delete-button').on('click', function(e) {
        e.preventDefault();

        if (confirm($(this).attr("confirm_message"))) {
            var child_id = $(this).data('id');
            var action = $(this).data('action');

            $.ajax({
                url: my_ajax_object.ajax_url, // WordPress provides this variable
                type: 'POST',
                data: {
                    action: action, // Custom action name
                    child_id: child_id,
                    form_nonce: my_ajax_object.form_nonce
                },
                success: function(response) {
                    if (response.success) {
                        alert('Item deleted successfully.');
                        location.reload(); // Reload page or update UI
                    } else {
                        alert('There was an error deleting the item.');
                    }
                }
            });
        }
    });


    $('.change-status').on('click', function(e) {
        e.preventDefault();

        if (confirm($(this).attr("confirm_message"))) {
            var child_id = $(this).data('id');
            var action = $(this).data('action');

            $.ajax({
                url: my_ajax_object.ajax_url, // WordPress provides this variable
                type: 'POST',
                data: {
                    action: action, // Custom action name
                    child_id: child_id,
                    form_nonce: my_ajax_object.form_nonce
                },
                success: function(response) {
                    if (response.success) {
                        alert('status successfully.');
                        location.reload(); // Reload page or update UI
                    } else {
                        alert('There was an error on changing item status.');
                    }
                }
            });
        }
    });

});