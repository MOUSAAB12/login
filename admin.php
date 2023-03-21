<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="admin.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js">
    </script>

</head>
<?php include("member.php");
?>

<body>
    <div class="table-users">
        <div class="header">member account </div>
        <table>
            <tr>
                <th>user name </th>
                <th>email </th>
                <th>phone </th>
                <th>nationality </th>
                <th>birthday</th>
                <th>country</th>
                <th>city</th>
                <th>btn </th>
            </tr>
            <?php foreach ($list_users as $user) : ?>
                <tr>
                    <td><?php echo $user['name_user'] ?></td>
                    <td><?php echo $user['email'] ?></td>
                    <td><?php echo $user['phone'] ?> </td>
                    <td><?php echo $user['nationality'] ?> </td>
                    <td><?php echo $user['birthday'] ?> </td>
                    <td><?php echo $user['country'] ?> </td>
                    <td><?php echo $user['city'] ?> </td>
                    <td>
                        <button class="inp" onclick="deleteUser(<?php echo $user['id'] ?>)">
                            <i>
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="auto" viewBox="0 0 1024 1024">
                                    <path fill="black" d="M160 256H96a32 32 0 0 1 0-64h256V95.936a32 32 0 0 1 32-32h256a32 32 0 0 1 32 32V192h256a32 32 0 1 1 0 64h-64v672a32 32 0 0 1-32 32H192a32 32 0 0 1-32-32V256zm448-64v-64H416v64h192zM224 896h576V256H224v640zm192-128a32 32 0 0 1-32-32V416a32 32 0 0 1 64 0v320a32 32 0 0 1-32 32zm192 0a32 32 0 0 1-32-32V416a32 32 0 0 1 64 0v320a32 32 0 0 1-32 32z" />
                                </svg>
                            </i> delete </button>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</body>
<script type="text/javascript">
    function
    deleteUser(id) {
        console.log(id);
        $.ajax({

                type: "POST",
                url: 'delete.php',
                data: {
                    user_id: id
                },
                dataType: "json",
                success: function(response) {
                    console.log(response.status);
                    if (response.status == '200') {
                        location.reload();
                    } else {
                        alert('something went wrong');
                    }

                }
            }

        );
    }
</script>

</html>