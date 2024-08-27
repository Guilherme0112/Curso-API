# Documentaçao da API RESTful, CRUD

- No arquivo "classes/db-classes.php" você pode conectar seu banco de dados MySQL, lembre-se de trocar os nomes das tabelas nas query's que ficam na pasta "classes".

- Nos verbos PUT e DELETE, tem que ser criada uma coluna chamada "_method" no formulário e colocar o método desejado.

Listar usuários (GET):
<br>
`localhost/api/usuarios/lista`

Inserir usuários (POST):
<br>
`localhost/api/usuarios/adicionar`

Editar usuários (PUT):
<br>
`localhost/api/usuarios/update/{id}`

Deletar usuários (DELETE):
<br>
`localhost/api/usuarios/delete/{id}`
