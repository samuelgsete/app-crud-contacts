<?php
    require_once "../ContactRepository.php";

    $id = $_GET['id'];
    $repository = new ContactRepository();
    $foundContact = $repository->findById($id);

?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
        <title>Editar Contato App</title>
        <style>
            * {
                margin: 0;
                padding: 0;
                font-family: 'Inter', sans-serif;
                font-size: 0.99em;
                letter-spacing: -0.3px;
            }
            main {
                height: 100vh;
                display: flex;
                justify-content: center;
                align-items: center;
            }

            form {
                width: 400px;
                padding: 50px 20px;
                box-shadow: rgba(0, 0, 0, 0.12) 0px 1px 3px, rgba(0, 0, 0, 0.24) 0px 1px 2px;
            }
        </style>
        <script>
            function goToHome() {
                window.location = '../';
            }
        </script>
    </head>
    <body>
        <main>
            <form action="update.php" method="post">
                <input 
                    name="id"
                    value="<?php echo $foundContact['id']; ?>"
                    type="text" 
                    hidden
                >

                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="name" class="form-label">Nome</label>
                                <input 
                                    id="name"
                                    value="<?php echo $foundContact['first_name']; ?>"
                                    type="text"
                                    class="form-control"
                                    placeholder="Ex.: Gabriel" required
                                    name="first_name"
                                >
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label for="surname" class="form-label">Sobrenome</label>
                                <input 
                                    id="surname"
                                    value="<?php echo $foundContact['last_name']; ?>"
                                    type="text"
                                    class="form-control"
                                    placeholder="Ex.: Silva"
                                    name="last_name"
                                    required
                                >
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="phone" class="form-label">Telefone</label>
                                <input 
                                    id="phone"
                                    value="<?php echo $foundContact['phone']; ?>"
                                    type="text"
                                    class="form-control"
                                    placeholder="Ex.: 9999999999"
                                    name="phone"
                                    required
                                >
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="email" class="form-label">E-mail</label>
                                <input
                                    id="email"
                                    value="<?php echo $foundContact['email']; ?>"
                                    type="email"
                                    class="form-control"
                                    placeholder="Ex.: gabrielsilva@email.com" 
                                    name="email"
                                    required
                                >
                            </div>
                        </div>
                    </div>
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-success">EDITAR CONTATO</button>
                        <button type="button" class="btn btn-light" onclick="goToHome()">CANCELAR</button>
                    </div>
                </div>
            </form>
        </main>
    </body>
</html>