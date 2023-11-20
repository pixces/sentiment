<?php
function renderCard($data) {
    echo '<div class="card">';
    echo '<div class="card-body">';
    echo '<h5 class="card-title">' . $data['title'] . '</h5>';
    echo '<p class="card-text">' . $data['description'] . '</p>';
    // Add more fields as needed
    echo '</div>';
    echo '</div>';
}

function renderError($message) {
    echo '<p class="text-danger">' . $message . '</p>';
}

function renderMessage($message) {
    echo '<p class="text-info">' . $message . '</p>';
}

?>

<script>
    // Function to update a card with new data
    function updateCard(cardId, newData) {
        // Implement the logic to update the card content
        var card = $('#card-' + cardId);
        card.find('.card-title').text(newData.title);
        card.find('.card-text').text(newData.description);
        // Update other fields as needed
    }

    // Simulate receiving data from the webhook
    // This can be replaced with actual code to listen for webhook events
    $(document).ready(function() {
        // Simulate a sample webhook data
        var webhookData = {
            id: 1,
            title: 'Updated Title',
            description: 'Updated Description'
            // Add other fields as needed
        };

        // Update the card using the received webhook data
        updateCard(webhookData.id, webhookData);

        // Uncomment the following lines to enable actual webhook handling
        // $.post('webhook.php', JSON.stringify(webhookData), function(updatedData) {
        //     updateCard(updatedData.id, updatedData);
        // });
    });
</script>