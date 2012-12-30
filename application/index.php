<style>
    body {
        font-family:Arial, Helvetica, sans-serif;
        font-size:14px;
    }
    a {text-decoration: none;color: #2AA1FC;}
    th {
        font-weight:bold;
        text-align:left;
        padding:4px;
    }
    td, th {
        padding: 0.5em;	
        white-space: nowrap;
        overflow: hidden;
        text-overflow:ellipsis;
    }
    .head {
        background-color:#333;
        color:#FFFFFF
    }
    .editbox{display:none}

    td{padding:7px;}

    .editbox, .addbox{
        font-size:14px;
        width:270px;
        background-color:#D2FFA8;
        border:solid 1px #FCBD11;
        padding:4px;
    }

    .edit:hover {
        background:url(edit.png) right no-repeat #80C8E5;
        cursor:pointer;
    }

    .new {display: none;}
</style>
<script>
    $(document).ready(function()
    { $(".add").click(function() 		// Bila class add diklik
        {
            $(".new").fadeIn('slow');  	 	// Contoh fitur show pake animasi Fade In
        })
    });

    // CREATE (Simpan data peserta baru) [Hanya disimpan ketika class Save diklik]
    $(document).ready(function()
    { $(".save").click(function()		// Bila class save diklik
        {
            var isi=$("#input_baru").val();
            var dataString = 'nama='+isi;

            if(isi.length >0)
            {
                $.ajax({
                    type: "POST",
                    url: "create.php",
                    data: dataString,
                    cache: false,
                    success: function(html)
                    {$("#main").load("load.php");}	
                    /* 
Ketika sukses, bertugas me-load file lain yang fokus menampilkan div id main. 
Dalam hal ini dimaksudkan agar data yang tampil adalah data terbaru yang ada di database.
load.php berfungsi hanya menampilkan #main dengan data terbaru dari database.
Bandingkan dengan contoh success pada fungsi UPDATE dibawah
                     */	
                });
            }
            else
            {alert('Enter something.');$(".new").show();}});
        $(".new").mouseup(function() 
        {return false});
        $(document).mouseup(function()
        {$(".new").hide();
        });
    });

    // UPDATE Peserta [Otomatis tersimpan tanpa submit (submitnya dengan klik diluar area class ini)]
    $(document).ready(function()
    { $(".edit").click(function()		// Bila class edit diklik
        {
            var ID=$(this).attr('id');
            $("#td_"+ID).hide();				// Contoh fitur hide tanpa efek animasi
            $("#input_"+ID).show();				// Contoh fitur show tanpa efek animasi
        }).change(function()
        {
            var ID=$(this).attr('id');
            var isi=$("#input_"+ID).val();
            var dataString = 'id='+ ID +'&nama='+isi;
            $("#td_"+ID).html('<img src="load.gif" />');

            if(isi.length >0)
            {
                $.ajax({
                    type: "POST",
                    url: "update.php",
                    data: dataString,
                    cache: false,
                    success: function(html)
                    {$("#td_"+ID).html(isi);}			// Ketika sukses, menampilkan data dummy yang baru saja terinput (bukan mengambil dari database)
                });
            }
            else
            {alert('Enter something.');}});
        $(".editbox").mouseup(function() 
        {return false});
        $(document).mouseup(function()
        {$(".editbox").hide();
            $(".text").show();
        });
    });

    // DELETE Peserta
    $(document).ready(function()
    { $(".del").click(function()		// Class del saat diklik
        {
            var ID = $(this).attr("id");
            var dataString = 'id='+ ID; 
            if(confirm("Apakah Anda yakin akan menghapus Item ini?"))
            {
                $.ajax({
                    type: "POST",
                    url: "delete.php",
                    data: dataString,
                    cache: false,
                    success: function(html)
                    {$(".tr_"+ID).fadeOut('slow');}	// Contoh fitur hide menggunakan Fade out
                });}
            return false;
        });
    });
</script>
<body>
    <div id="main" style="margin:0 auto; width:500px; padding:10px; background-color:#fff; height:500px;">

        <table width="100%">
            <tr class="head">
            </tr>
            <?php
            $str_id = $this->uri->segment(3);
            $query = $this->db->query("SELECT * FROM srt_movie_litlecomment where identifi ='".$str_id."'");
            $i = 1;
            while ($r = mysql_fetch_array($query)) {
                //fetch_array_menghasilkan seperti dibawah ini:
                $visitor = $r['lilcomvisitor'];
                $lilcomment = $r['lilcomment'];
                if ($i % 2) {
                    ?>
                    <!-- Agar baris (tr) ganjil dan genap memiliki warna  berbeda -->
                    <tr class="tr_<?php echo $visitor; ?>"> 
                    <?php } else { ?>
                    <tr class="tr_<?php echo $visitor; ?>" bgcolor="#f2f2f2">
                    <?php } ?>

                    <td id="<?php echo $visitor; ?>">
                        <span id="td_<?php echo $visitor; ?>" class="text"><?php echo $lilcomment; ?></span>
                        <input type="text" value="<?php echo $lilcomment; ?>" class="editbox" id="input_<?php echo $visitor; ?>" />
                    </td>
                </tr>
                <?php
                $i++;
            }
            ?>
            <!-- Khusus menangani Tambah Peserta baru -->
            <tr class="new">
                <td>
                    <input type="text" value="" class="addbox" id="input_baru" />
                </td>
                <td align="center">
                    <a href="#" class="save">Save</a>
                </td>
            </tr>

        </table>
        <hr /><a href="#" class="add">Tambah Peserta</a> 
    </div>
</body>
