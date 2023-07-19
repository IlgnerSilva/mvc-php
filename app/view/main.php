<?php
    //print_r(json_encode($user->getUsers(["id", "nome", "email", "(SELECT nome FROM teste2 WHERE id = teste.id) AS id"], "teste")));
    if(isset($_POST['acao'])){
        $user = new User();
        if($_POST['nome'] && $_POST['email']){
            $user->addUser("teste", $_POST['nome'], $_POST['email']);
            header("Location: /");
        }
    }
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <?php include(dirname(__DIR__) . "/includes/head.php") ?>
    <title>MVC</title>
</head>

<body>
    <main class="main container min-h-screen flex w-full items-center justify-center">
        <div class="w-max">
            <form class="" method="post">
                <div class="nome">
                    <label for="nome">Nome</label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="nome" name="nome" type="text" required />
                </div>

                <div class="email ">
                    <label for="email">Emali</label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="nome" name="email" type="email" required />
                </div>

                <div class="button">
                    <button value="acao" name="acao" type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline my-2">Salvar</button>
                </div>
            </form>

            <table class="border-collapse border border-slate-400 ...">
                <thead>
                    <tr>
                        <th class="border border-slate-300 ...">Nome</th>
                        <th class="border border-slate-300 ...">Senha</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="border border-slate-300 ...">Indiana</td>
                        <td class="border border-slate-300 ...">Indianapolis</td>
                    </tr>
                    <tr>
                        <td class="border border-slate-300 ...">Ohio</td>
                        <td class="border border-slate-300 ...">Columbus</td>
                    </tr>
                    <tr>
                        <td class="border border-slate-300 ...">Michigan</td>
                        <td class="border border-slate-300 ...">Detroit</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </main>
</body>

</html>