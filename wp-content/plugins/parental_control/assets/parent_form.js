jQuery(document).ready(function($) {
    $('#pcpc_parent_register_form').submit(function(e) {
        e.preventDefault();

        var formData = $(this).serialize();

        $.ajax({
            url: my_ajax_object.ajax_url, // Use my_ajax_object.ajax_url
            type: 'POST',
            data: formData,
            success: function(response) {
                if (response.success) {
                    $("#errors").html('');
                    // Handle successful registration, e.g., redirect to login page
                    window.location.href = my_ajax_object.login_url;
                } else {
                    // Handle error, display error message to user
                    console.error(response.data);
                    $("#errors").html(response.data);

                    // Display error message to user
                }
                // Handle success response
                console.log(response);
            },
            error: function(error) {
                // Handle error response
                console.log(error);
            }
        });
    });
});
