<script language='javascript'>
    function showMajor()
    {
        <?php
            include "connection.php";
            $query = "select * from universities order by id asc";
            $results=mysqli_query($link, $query);

            while($data = mysqli_fetch_array($results))
            {
                $univ = $data['id'];
                echo "if(document.form1.univ.value==\"".$univ."\")";
                echo "{";

                $query2 = "select * from majors where univID='$univ' order by id asc";
                $results2 = mysqli_query($link, $query2);
                $content = "document.getElementById('major').innerHTML=\"";

                while($data2 = mysqli_fetch_array($results2))
                {
                    $content .="<option value='".$data2['id']."'>".$data2['majorName'].'';
                }
                
                $content .="\"";
                echo $content;
                echo "}\n";
            }
        ?>
    }
</script>