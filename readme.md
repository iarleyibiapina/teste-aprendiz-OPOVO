__Para execução é necessario:
Iniciar um servidor local, no meu caso eu utilizeio xampp iniciando:
-modulo apache
-modulo mysql

logo depois é necessario criar o banco com o seguinte sql:
create database opovo

use opovo

create table lembrete(
 id_lembrete int primary key auto_increment,
 titulo varchar(50) not null,
 descricao varchar(150) not null
)

depois é necessario definir as variaveis de conexao na pasta 'data> conexao.php'
    $host = "localhost";
    $port = "3306";
    $user = "root";
    $password = "";
    $dbname = "opovo";

e por fim, inserir o diretorio do arquivo na url do navegador.

__Ideia de projeto

Criar pagina onde seria possivel criar, editar e excluir pequenos lembretes. O meu foco em projetos pessoais é sempre focar primeiro na parte logica, funcional e depois de feito, refaço o codigo porem com uma estrutura mais bem construida alem da estilização.

Minhas ferramentas foram: phpMyAdmin (apenas para criar o banco), Dbeaver como gerenciador do banco, xampp como servidor local, visualStudio como IDE.

__Estrutura do projeto

Na pagina inicial, a ideia era ser uma pagina central, onde teria um outro link chamado 'ver lembretes criados' e este listaria os conteudos criados.

painelLembretes:
Nesta pagina é listado todos os 'lembretes' criados. Caso não exista acima tem um botão de 'criar' e ao lado tem uma opção de deletar todos o s lembretes já criado, abaixo dos lembretes já criados teria as opções de 'editar' e 'excluir'.

Home > criar:
-Aqui teria um formulario com dois campos, um de titulo e outro de descrição, os dois são necessários e após enviar retorna a pagina home.
Home > editar: 
-Aqui os dados são puxados e o usuario poderá atualizar, após enviar retorna a pagina home.
Home > excluir:
-Aqui os dados são puxados mas apenas para visualização, o usuario não tera interatividade e podera rever os dados que serão excluidos.

__No visualstudio

Estrutura de pastas:
Com base em meu outro projeto, utilizei uma estrutura de pastas que estava estudando, a pasta 'views', ficaria todo os arquivos de pagina.
'model' ainda não cheguei a estudar bem sua estrutura e funcionalidade, então utilizei para fazer consultas ao banco e validar os processos.

A pasta 'data' fica os arquivos de configuração do banco.
A pasta 'model' eu utilizei para o arquivo de 'processType' onde seria feito o tipo de processo 'ler, escrever, excluir' do lembrete. 
A pasta 'src' guarda arquivos de Javascript, style e imagens.
A pasta 'views > form-duvida' fica os 3 arquivos onde será feito as etapas de inserçao, edição e remoção de dados.
Em 'views > home.php' ficará o arquivo que exibirá os dados gerados.

Processo:
O formulario de lembretes é dividido em 3 arquivos: criar, editar e excluir. Quando o usuario clica no botão de enviar cada formulario tem um 'valor' que define cada tipo, após isso o formulario segue para o arquivo 'processType.php' onde dependendo do valor do botão de envio pode ser de criar, editar e excluir. Os 3 processos em um só arquivo. Se houver alguma falha em alguma etapa é retornado a pagina 'painelLembretes' com uma url indicando o 'tipo' de erro.

-formCreate: no formulario utilizei o metodo POST, com action para o 'processType.php', possui os dois campos necessários e envia novos dados, aqui o botão de envio possui um 'value' definido como 'create' que será usado posteriormente.
-formEdit: Os dados são puxados e é exibido o titulo do lembrete no titulo da pagina e tambem são exibidos nos campos, aqui o botão de envio possui um 'value' definido como 'edit' que será usado posteriormente. 
-deleteForm: Aqui os dados são puxados como o 'edit' mas com uma diferença de que os dados só poderão ser visualizados, ou seja aqui não há como digitar nos campos, a ideia era o usuario revisar os dados ou confimar a deleção, aqui o botão de envio possui um 'value' definido como remove' que será usado posteriormente.

-proccessType:
neste arquivo eu usei um 'switch' na qual dependendo do 'value' enviado pelo formulario, fará o processo de inserir, alterar e deletar.
Depois de pegar o tipo, é feito a consulta utilizando o pdo, cada etapa da consulta eu fiz um 'isolamento' onde se houver um erro em determinado local é retornado a pagina 'painelLembrete' e tera uma dica na url para melhor busca.


