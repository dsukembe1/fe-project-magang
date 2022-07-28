$(document).ready(function(){

    getNilai();

    $("#btnTambah").on("click", function(e){
        $("#tabelTambah").toggle();
    });

    function getNilai(){
        $('#isiTable').html('');
        $.ajax({
            url: 'http://127.0.0.1:8080/api/kelas6',
            method: 'get',
            dataType: 'json',
            data: {
                test: 'test data'
            },
            success: function(data) {
                $(data).each(function(i, kelas6){
                    $('#isiTable').append($("<tr>")
                                .append($("<td>").append(kelas6.nis))
                                .append($("<td>").append(kelas6.nama))
                                .append($("<td>").append(kelas6.nama_mapel))
                                .append($("<td>").append(kelas6.nh1))
                                .append($("<td>").append(kelas6.nh2))
                                .append($("<td>").append(kelas6.uts))
                                .append($("<td>").append(kelas6.uas))
                                .append($("<td>").append(kelas6.na))
                                .append($("<td>").append(`
                                        <button class="glyphicon glyphicon-edit btneditNilai" data-tutid="`+kelas6.nis+`"></button> 
                                        <button class="glyphicon glyphicon-remove btndeleteNilai" data-tutid="`+kelas6.nis+`"></button>
                                        `)));
                });
            loadButtons();
            }
        })
    }

    function updateData(id){
        $.ajax({
            url: 'http://127.0.0.1:8080/api/kelas6/' + id,
            method: 'get',
            dataType: 'json',
            success: function(data) {
                $($("#updateData")[0].nis).val(data.nis);
                $($("#updateData")[0].updateNis).val(data.nis);
                $($("#updateData")[0].updateNama).val(data.nama);
                $($("#updateData")[0].updateNama_mapel).val(data.nama_mapel);
                $($("#updateData")[0].updateNh1).val(data.nh1);
                $($("#updateData")[0].updateNh2).val(data.nh2);
                $($("#updateData")[0].updateUts).val(data.uts);
                $($("#updateData")[0].updateUas).val(data.uas);
                $($("#updateData")[0].updateNa).val(data.na);
                $("#updateData").show();
            }
        });
    }

    $("#submitData").on("click", function(e) {
        let data = {
            nis: $($("#tabelTambah")[0].nis).val(),
            nama: $($("#tabelTambah")[0].nama).val(),
            nama_mapel: $($("#tabelTambah")[0].nama_mapel).val(),
            nh1: $($("#tabelTambah")[0].nh1).val(),
            nh2: $($("#tabelTambah")[0].nh2).val(),
            uts: $($("#tabelTambah")[0].uts).val(),
            uas: $($("#tabelTambah")[0].uas).val(),
            na: $($("#tabelTambah")[0].na).val()
        } 
        
        postData(data);
        $("#tabelTambah").trigger("reset");
        $("#tabelTambah").toggle();
        e.preventDefault();
        
    });
    
    function postData(data) {
         $.ajax({
             url: 'http://127.0.0.1:8080/api/kelas6',
             method: 'POST',
             dataType: 'json',
             data: data,
             success: function(data) {
                 console.log(data);
                 getNilai();
             }
         });
    }

    function loadButtons() {
        $(".btneditNilai").click(function(e){
            updateData($($(this)[0]).data("tutid"));
            e.preventDefault();
        });

        $(".btndeleteNilai").click(function(e){
            deleteNilai($($(this)[0]).data("tutid"));
            e.preventDefault();
        })
    }

    function putData(id, data){
        $.ajax({
            url: 'http://127.0.0.1:8080/api/kelas6/' + id,
            method: 'PUT',
            dataType: 'json',
            data: data,
            success: function(data) {
                console.log(data);
                getNilai();
            }
        });
    }

    $("#btnUpdateData").on("click", function(e) {
        let data = {
            nis: $($("#updateData")[0].updateNis).val(),
            nama: $($("#updateData")[0].updateNama).val(),
            nama_mapel: $($("#updateData")[0].updateNama_mapel).val(),
            nh1: $($("#updateData")[0].updateNh1).val(),
            nh2: $($("#updateData")[0].updateNh2).val(),
            uts: $($("#updateData")[0].updateUts).val(),
            uas: $($("#updateData")[0].updateUas).val(),
            na: $($("#updateData")[0].updateNa).val()
        }
        
        putData($($("#updateData")[0].nis).val(), data);
        $("#updateData").trigger("reset");
        $("#updateData").toggle();
        e.preventDefault();
        
    });

    function deleteNilai(id){
        $.ajax({
            url: 'http://127.0.0.1:8080/api/kelas6/' + id,
            method: 'DELETE',
            dataType: 'json',
            success: function(data) {
                console.log(data);
                getNilai();
            }
        });
    }

});