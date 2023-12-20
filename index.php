<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="formulario.css" media="screen">

        <title>Formulário</title>
    </head>
    <body>
        <form action="config.php" method="post" enctype="multipart/form-data">
            <div>
                <h1 id="titulo">Formulário de cadastro</h1>            
                <br>
            </div>
            <fieldset class="grupo">
                <div class="campo">
                    <label><strong>Nome *</strong></label>
                    <input type="text" name="nome" id="nome" placeholder="Digite seu primeiro nome" required><br>                
                    
                </div>
                <div class="campo">
                    <label><strong>Sobrenome *</strong></label>
                    <input type="text" name="sobrenome" id="sobrenome" placeholder="Digite o seu sobrenome " required>                    
                </div>
            </fieldset>
            <fieldset>
                <div class="campo">
                    <label for="email"><strong>Email *</strong></label>
                    <input type="email" name="email" id="email" placeholder="Digite seu e-mail" required>                    
                </div>
                <div class="campo">
                    <label for="telefone"><strong>Telefone *</strong></label>
                    <input type="tel" name="telefone" id="telefone" placeholder="(xx) xxxxx-xxxx" required>                    
                </div>
            </fieldset>
            <fieldset>
                <div class="campo">
                    <label><strong>Cargo Desejado *</strong></label>                
                    <textarea row="1" id="cargo" name="cargo" required></textarea>                    
            </div>
            </fieldset>
            <fieldset>
                <div class="campo">
                    <label><strong>Escolaridade *</strong></label>
                    <select id="escolaridade" name="escolaridade" required>
                        <option selected disabled value="">- - - - - -</option>
                        <option>Ensino Médio</option>
                        <option>Ensino Superior Incompleto</option>
                        <option>Ensino Superior Completo</option>
                        <option>Pós-Graduado</option>
                        <option>Doutorado</option>
                    </select>                    
                </div>
            <fieldset>
                <div class="campo">
                    <label><strong>Observações:</strong></label>
                    <textarea id="observacoes" name="observacoes" rows="4" cols="50"></textarea>           
                </div>
                <div class="campo">
                    <label  id="aviso" name="aviso">*OBS: Os campos são obrigatórios.</label>
                </div>
                <div class="submit">
                    <label for="arquivo">Selecione o currículo (PDF ou Word):</label>
                    <input type="file" id="arquivo" name="arquivo" accept=".pdf, .doc, .docx" required>
                </div>
                
            </fieldset><br>
                      
            </fieldset>
            <br>
            <button class="botao" type="submit"><strong>Enviar</strong></button>
        </form>

    </body>
</html>

