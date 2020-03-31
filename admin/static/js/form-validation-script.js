var Script = function () {

    

    $().ready(function() {
        // validate the comment form when it is submitted
        $("#feedback_form").validate();

        // validate signup form on keyup and submit
        $(".register_form").validate({
            rules: {
                fullname: {
                    required: true,
                    minlength: 6
                },
				no_telpon: {
                    required: true,
                    minlength: 10
                },
                alamat: {
                    required: true,
                    minlength: 10
                },
                username: {
                    required: true,
                    minlength: 5
                },
                password: {
                    required: true,
                    minlength: 5
                },
                confirm_password: {
                    required: true,
                    minlength: 5,
                    equalTo: "#password"
                },
                email: {
                    required: true,
                    email: true
                },
				judul: {
                    required: true
                },
				pengarang: {
                    required: true
                },
				penerbit: {
                    required: true
                },
				kota_terbit: {
                    required: true
                },
				isbn: {
                    required: true
                },
				lokasi: {
                    required: true
                },
				stok: {
                    required: true
                },
				tahun_terbit: {
                    required: true,
					minlength:4,
					maxlength:4
                },
                topic: {
                    required: "#newsletter:checked",
                    minlength: 2
                },
                agree: "required"
            },
            messages: {                
                fullname: {
                    required: "Please enter a Full Name.",
                    minlength: "Your Full Name must consist of at least 6 characters long."
                },
				no_telpon: {
                    required: "masukkan nomor telepon.",
                    minlength: "nomor telepon yang dimasukkan minimal 10 huruf."
                },
                alamat: {
                    required: "masukkan alamat.",
                    minlength: "alamat yang dimasukkan minimal 10 huruf."
                },
                username: {
                    required: "Please enter a Username.",
                    minlength: "Your username must consist of at least 5 characters long."
                },
                password: {
                    required: "masukkan password",
                    minlength: "password minimal 5 huruf"
                },
                confirm_password: {
                    required: "masukkan konfirmasi password",
                    minlength: "password minimal 5 huruf",
                    equalTo: "masukkan password yang sama"
                },
				tahun_terbit: {
                    required: "masukkan tahun buku terbit",
					minlength:"tahun terbit terdiri dari 4 angka",
					maxlength:"tahun terbit terdiri dari 4 angka"
                },
                email: "masukkan alamat email",
				judul: "masukkan judul buku",
				pengarang: "masukkan nama pengarang",
				penerbit: "masukkan penerbit buku",
				kota_terbit: "masukkan kota buku terbit",
				isbn: "masukkan nomor isbn",
				lokasi: "masukkan lokasi penyimpanan buku",
				stok: "masukkan stok buku",
                agree: "Please accept our terms & condition."
            }
        });

        // propose username by combining first- and lastname
        $("#username").focus(function() {
            var firstname = $("#firstname").val();
            var lastname = $("#lastname").val();
            if(firstname && lastname && !this.value) {
                this.value = firstname + "." + lastname;
            }
        });

        //code to hide topic selection, disable for demo
        var newsletter = $("#newsletter");
        // newsletter topics are optional, hide at first
        var inital = newsletter.is(":checked");
        var topics = $("#newsletter_topics")[inital ? "removeClass" : "addClass"]("gray");
        var topicInputs = topics.find("input").attr("disabled", !inital);
        // show when newsletter is checked
        newsletter.click(function() {
            topics[this.checked ? "removeClass" : "addClass"]("gray");
            topicInputs.attr("disabled", !this.checked);
        });
    });


}();