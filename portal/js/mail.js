$(document).ready(function () {
    $("#send-message").click(function (a) {
        a.preventDefault();
        var b = !1,
			c = $("#name").val(),
			d = $("#email").val();
        $("#subject").val();
        var f = $("#message").val(),
			g = "form-alert-";
        if (0 == c.length) {
            var b = !0;
            $("#" + g + "name").fadeIn(500)
        }
        else $("#" + g + "name").fadeOut(500);
        if (0 == d.length || "-1" == d.indexOf("@")) {
            var b = !0;
            $("#" + g + "email").fadeIn(500)
        }
        else $("#" + g + "email").fadeOut(500);
        if (0 == f.length) {
            var b = !0;
            $("#" + g + "message").fadeIn(500)
        }
        else $("#" + g + "message").fadeOut(500);

        0 == b && ($("#send-message").attr(
		{
		    disabled: "true",
		    value: "Sending..."
		}),

        $.post("includes/mail/index.php", $("#contact-form").serialize(), function (a) 
        {
		    "sent" == a ? ($("#send-message").remove(), $("#" + g + "success").fadeIn(500)) : ($("#" + g + "fail").fadeIn(500), $("#send-message").removeAttr("disabled").attr("value", "Send The Message"))
		}))
    })
});