            
  <div class="readme file file-markup wiki-content">
    <p><img alt="mobilesaude.com.br" src="https://www.mobilesaude.com.br/challenge/2018-2/cabecalho.png"></p>
<h1 id="markdown-header-descricao-challenge-backend-mobile-saude-2020-2">Descrição Challenge Backend Mobile Saúde – 2020-2</h1>
<p><em>Por: Vinicius Fiorio</em> –  <a href="mailto:vinicius@mobilesaude.com.br" rel="nofollow">vinicius@mobilesaude.com.br</a></p>
<h3 id="markdown-header-o-que-sera-analisado">O que será analisado?</h3>
<p>Compreensão do escopo, lógica, organização do projeto e do código, modelagem e manipulação de dados, tecnologias utilizadas, domínio da linguagem e desempenho da aplicação</p>
<h3 id="markdown-header-entrega">Entrega</h3>
<p>O código fonte deve ser entregue via e-mail, junto com o dump do banco de dados, o código fonte pode estar compactado ou em algum repositório PRIVADO. Junto ao e-mail deve ser entregue orientações para o deploy da aplicação, além de qualquer outra informação necessária para sua execução. </p>
<p>Envie a partir do mesmo e-mail incluído no formulário da vaga.</p>
<h3 id="markdown-header-escopo">Escopo</h3>
<p>O challenge consiste na criação de uma interface web (responsiva) que busque os municípios do Brasil tendo como base os dados públicos do IBGE. O sistema deve ser capaz de filtrar os municípios por Região e/ou Estado realizando uma busca no nome do município, que deve ser linkada com o site do IBGE.</p>
<p>O sistema possui 3 módulos principais</p>
<h4 id="markdown-header-banco-de-dados-mysql-ou-postgresql">Banco de Dados (MySql ou PostgreSQL)</h4>
<ol>
<li>Criar banco de dados e publicar com os dados <a href="http://mobilesaude.com.br/challenge/2018-2/challenge_backend_dados_dist.zip" rel="nofollow">CSV - Regiões, estados e municipios</a></li>
<li>Aplicar técnicas de performance de consultas</li>
<li>Aplicar técnicas de relacionamento entre tabelas </li>
</ol>
<h4 id="markdown-header-api-rest-deve-ser-escrita-em-php-nodejs-ou-java-de-acordo-com-a-vaga-aplicada">API REST (deve ser escrita em PHP, NODE.JS ou JAVA de acordo com a vaga aplicada):</h4>
<ol>
<li>Lista de regiões políticas do Brasil;</li>
<li>Lista todas as UF do Brasil; </li>
<li>Lista todos os municípios por UF;</li>
<li>Busca por municípios, estado + busca do usuário;</li>
<li>Busca por municípios, região + busca do usuário.</li>
</ol>
<h4 id="markdown-header-interface-web-preferencialmente-utilizando-bootstrap-4">Interface WEB (preferencialmente utilizando Bootstrap 4):</h4>
<ol>
<li>Formulário para busca; </li>
<li>Combo-box de regiões; </li>
<li>Combo-box de estados; </li>
<li>Input de texto para busca; </li>
<li>Lista com os resultados da busca (que deve ser linkada com o site do IBGE para o usuário buscar mais informações, como no exemplo: <a class="ap-connect-link" href="https://sidra.ibge.gov.br/territorio#/N6/3205309" rel="nofollow">https://sidra.ibge.gov.br/territorio#/N6/3205309</a>); </li>
</ol>
<p>É importante que a interface web, seja desacoplada da API que realizará a busca ou que use algum Framework MVC que tenha uma separação clara de funções dos módulos utilizados. </p>
<hr>
<h3 id="markdown-header-referencias">Referências</h3>
<p><a href="http://mobilesaude.com.br/challenge/2018-2/img1.png" rel="nofollow">Resultado da busca: Interface web.png</a></p>
<p><a href="http://mobilesaude.com.br/challenge/2018-2/img2.png" rel="nofollow">Resultado da mesma busca na API - busca.png</a></p>
<hr>
<p><img alt="mobilesaude.com.br" src="https://www.mobilesaude.com.br/challenge/logo-mobilesaude-cor.png"></p>
<hr>
<h1 id="markdown-header-descricao-challenge-backend-mobile-saude-2020-2">Parte do desenvolvedor</h1> 
<p><h3 id="markdown-header-descricao-challenge-backend-mobile-saude-2020-2">Instalação do Projeto</h3></p>
<ol>
<li>Realizar a instalação de um servidor web WAMP ou XAMPP, se preferir pode ser utilizado o próprio servidor do PHP.</li>
<li>Criar uma pasta chamada desafio_mobile_saude e clonar este repositório dentro dessa pasta.</li>
<li>Após a clonagem do repositório, é necessário instalar as dependências do projeto e para isso podemos prosseguir com comando <code>composer install</code>
no terminal do vscode ou cmd do windowns.</li>
<li>Com a instalação das depêndencias concluída podemos acessar a aplicação com a seguinte url</li> <code>http://localhost/desafio_mobile_saude/ibge/public/</code>
</ol>
<p><h3 id="markdown-header-descricao-challenge-backend-mobile-saude-2020-2">Endpoints</h3></p>
<ul>
<li>DATABASE=ibge</li>
<li>USERNAME=root</li>
<li>PASSWORD=</li>
</ul>

<p><h3 id="markdown-header-descricao-challenge-backend-mobile-saude-2020-2">Endpoints</h3></p>
<ol>
<li><code>http://localhost/desafio_mobile_saude/ibge/public/api/regiao</code></li>
<li><code>http://localhost/desafio_mobile_saude/ibge/public/api/estado</code></li>
<li><code>http://localhost/desafio_mobile_saude/ibge/public/api/municipio</code></li>
</ol>

<p><h3 id="markdown-header-descricao-challenge-backend-mobile-saude-2020-2">Regras da aplicação</h3></p>
<ol>
<li>Os campos região e estado são obrigatórios para obter uma busca precisa.</li>
</ol>
