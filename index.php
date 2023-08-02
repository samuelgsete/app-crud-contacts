
<?php
    require_once "./ContactRepository.php";

    $search = $_GET['search'];
    $repository = new ContactRepository();
    $contacts = $repository->findAll($search);    
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
        <title>My Contacts CRUD App</title>
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300&display=swap');

            * {
                margin: 0;
                padding: 0;
                font-family: 'Inter', sans-serif;
                font-size: 0.99em;
                letter-spacing: -0.3px;
            }
            header {
                display: flex;
                align-items: center;
                justify-content: space-between;
                padding: 0 0 30px 0;
            }
            header h1 {
                font-size: 1.9em;
            }
            main {
                padding: 3% 6%;
            }
            button:first-child {
                margin-right: 6px;
            }
            table {
                box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;
            }

            table tr td {
                padding: 10px !important;
            }
            .input-search {
                width: 300px;
            }
        </style>
        <script>
            function goToCreate() {
                window.location = './create';
            }
            function deleteOne(id) {
                window.location = './delete?id=' + id;
            }
            function update(id) {
                window.location = './edit?id=' + id;
            }
            function search() {
                const keyword = document.getElementById("search").value;
                window.location = `./?search=${keyword}`;
            }
        </script>
    </head>
    <body>
        <main>
            <header>
                <h1>Contatos</h1>
                <div class="input-search input-group mb-3">
                    <input 
                        id="search"
                        value='<?php echo $search ?>'
                        type="text"
                        class="form-control"
                        placeholder="Ex: Marta"
                    >
                    <button class="btn btn-outline-dark" onclick="search()" type="button">Pesquisar</button>
                </div>
                <button class="btn btn-light" onclick="goToCreate()">NOVO CONTATO</button>
            </header>
            <table class="table table-striped">
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Sobrenome</th>
                    <th>Telefone</th>
                    <th>E-mail</th>
                    <th>Ações</th>
                </tr>
                <?php
                    foreach($contacts as $contact) {
                        echo "<td> ".$contact['id']."</td>";
                        echo "<td> ".$contact['first_name']."</td>";
                        echo "<td> ".$contact['last_name']."</td>";
                        echo "<td> ".$contact['phone']."</td>"; 
                        echo "<td> ".$contact['email']."</td>";
                        echo "<td>";
                        echo "<button class='btn btn-primary btn-sm' onclick='update(".$contact['id'].")'>EDITAR</button>";
                        echo "<button class='btn btn-danger btn-sm' onclick='deleteOne(".$contact['id'].")'>REMOVER</button>";
                        echo "</td>";
                        echo "</tr>"; 
                    }
                ?>
            </table>
        </main>
    </body>
</html>