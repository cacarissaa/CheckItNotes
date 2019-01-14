<script language='javascript'>
    function showSemester()
    {
        <?php
            include "connection.php";
            $query = "select * from majors order by id asc";
            $results=mysqli_query($link, $query);

            while($data = mysqli_fetch_array($results))
            {
                $major = $data['id'];
                echo "if(document.form1.major.value==\"".$major."\")";
                echo "{";

                $query2 = "select * from semesters where majorID='$major' order by semesterName asc";
                $results2 = mysqli_query($link, $query2);
                $content = "document.getElementById('semester').innerHTML=\"";

                while($data2 = mysqli_fetch_array($results2))
                {
                    $content .="<option value='".$data2['id']."'>".$data2['semesterName'].'';
                }

                $content .="\"";
                echo $content;
                echo "}\n";
            }
        ?>
    }
</script>