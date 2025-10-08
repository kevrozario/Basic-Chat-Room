$(document).ready(function() {
    function retrieveChatEntries(name) {
        if (name.trim() !== "") {
            $.get("retrieve_chat.php?name=" + name, function(data) {
                if (data.trim() !== "" && data.trim() !== "User is not found") {
                    $("#chat-history").html(data);
                } else {
                    $("#chat-history").text("User not found");
                }
            });
        } else {
            $("#chat-history").empty();
        }
    }

    function retrieveNames() {
        $.get("list_names.php", function(data) {
            $("#names").html(data);
        });
    }
    
    retrieveNames();
    retrieveChatEntries("");

    function periodicRetrieval() {
        var retrieveName = $("#retrieve-name").val();
        retrieveChatEntries(retrieveName);
        setTimeout(periodicRetrieval, 100); 
    }

    periodicRetrieval();

    $("#content").on("input", function() {
        var name = $("#name").val();
        var password = $("#password").val();
        var content = $(this).val();
        
        if (content.trim() !== "") {
            $.post("update_chat.php", {name: name, password: password, content: content}, function(data) {
                console.log(data);
            });
        }
    });

    $("#chat-form").submit(function(event) {
        event.preventDefault(); 
        var name = $("#name").val();
        var password = $("#password").val();
        var content = $("#content").val();
        
        if (content.trim() !== "") {
            $.post("update_chat.php", {name: name, password: password, content: content}, function(data) {
                console.log(data);
                retrieveChatEntries(name); 
            });
        }
    });

    $("#retrieve-name").on("input", function() {
        var retrieveName = $(this).val();
        retrieveChatEntries(retrieveName);
    });
});
