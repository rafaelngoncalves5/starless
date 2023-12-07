<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Rafael N - Curriculum</title>

    <link rel='ico' href="{{ asset('faivon.ico') }}" />

    @vite('resources/css/app.css')

</head>


<body id="curriculum-body">

    <div class="z-0">
        <!-- -->

        {{-- Cloud 1 --}}
        <div class="absolute fit-content mt-5 ml-5 left-24 cloud">
            <img class="h-28" src="{{ asset('media/cloud.png') }}" alt="cloud" />
        </div>

        {{-- Cloud 2 --}}
        <div class="absolute fit-content top-48 left-72 cloud">
            <img class="h-12" src="{{ asset('media/cloud.png') }}" alt="cloud" />
        </div>

        {{-- Cloud 3 --}}
        <div class="float-right fit-content relative top-56 cloud">
            <img class="h-36" src="{{ asset('media/cloud.png') }}" alt="cloud" />
        </div>

        {{-- Cloud 4 --}}
        <div class="float-right fit-content relative top-4 right-20 cloud">
            <img class="h-24" src="{{ asset('media/cloud.png') }}" alt="cloud" />
        </div>

        <!-- -->
    </div>

    {{-- Sans for headers and serif for larger texts  --}}
    <header class='font-bold text-center z-40'>
        <h1 class="text-sky-500 text-6xl font-sans">Rafael N</h1>
        <p class="font-light text-zinc-400 mt-2 mb-5 pb-5 antialiased px-5">Estudante do 5º Semestre de Análise e Desenvolvimento de Sistemas na PUC-MG.</p>
    </header>

    <main id="curriculum-main" class="flex mx-sm:flex-col max-md:flex-col mt-5 pt-5 z-1">

        {{-- --}}
        <div class="p-5 max-sm:w-96 max-md:w-96 w-1/3 mt-5 pt-5 mx-auto">

            <div class="shadow-md rounded-lg min-h-fit">
                <h3 class="text-center font-bold text-sky-500">Experiências</h3>

                <ul class="p-4">
                    <!-- -->
                    <li><strong>
                            OLIVEIRA GONTIJO, Contagem — Almoxarife
                            25/06/2023 - Atualmente
                        </strong>
                        Inventário, separação, recebimento, conferência, embalamento de mercadorias, etc.
                    </li>

                    <!-- -->
                    <br />
                    <li><strong>
                            GS COMERCIO DE COSMETICOS E LOGISTICA LTDA, Contagem — Expedidor de Mercadorias
                            07/2022 - 10/2022
                        </strong>
                        Controle de planilha, reposição, separação, embalamento, etc
                    </li>
                    <br />

                    <!-- -->
                    <li><strong>
                            Grupo MBF, Contagem — Consultor
                            09/2020 - 11/2020
                        </strong>
                        Gerenciava e me comunicava com leads através de um sistema de CRM para informá-los de erros de bitributação em alíquotas tributárias </li>
                </ul>
            </div>

            {{-- --}}
            <div class="shadow-md rounded-lg min-h-fit max-sm:w-96 max-md:w-96 mx-auto">
                <h3 class="text-center font-bold text-sky-500 p-4">Formação</h3>

                <ul class="p-4">

                    <li>
                        <strong>PUC, MG — </strong>Tecnólogo em Análise e Desenvolvimento de Sistemas
                        <br />
                        <strong>01/2022 - Atualmente</strong>
                    </li>

                    <br />

                    <li>
                        <strong>SENAI, MS — </strong> Lógica de Programação
                        <br />
                        <strong>11/2023</strong>
                    </li>

                    <br />

                    <li>
                        <strong>SENAI, MS — </strong> Iniciação profissional em Editor de Texto, Apresentação Eletrônica e Planilha Eletrônica
                        <br />
                        <strong>10/2019</strong>
                    </li>

                    <br />

                    <li>
                        <strong>FUNEC, Ressaca — </strong>Ensino Médio Completo
                        <br />
                        <strong>02/2017 - 12/2019</strong>
                    </li>

                    <br />

                </ul>
            </div>
        </div>

        {{-- --}}
        <div class="max-sm:w-96 mx-auto max-md:w-96 mx-auto p-5 m-5 w-1/3 shadow-md rounded-lg mt-5 pt-5 min-h-fit">

            <h3 class="text-center font-bold text-sky-500">Habilidades</h3>

            <ul class="list-disc p-4">
                <li>Documentação, testes, manutenção, desenvolvimento, hospedagem</li>
                <li>Design e integração de APIs e Web Services</li>
                <li>Algoritmos e estruturas de dados</li>
                <li>Algoritmos e lógica de programação</li>
                <li>Computação em nuvem</li>
                <li>Infraestrutura básica</li>
                <li>Versionamento, gerenciamento de pacotes, modularização</li>
                <li>Arquitetura de software</li>
                <li>Padrões de software</li>

                <br />
                {{-- Stack --}}
                <li>C++/C, PHP, Laravel, Python</li>
                <li>HTML, CSS, TypeScript, JavaScript, Tailwind CSS</li>
                <li>React, React Native</li>
                <li>MySQL, bancos de dados relacionais e não relacionais</li>
                <li>Hipervisores, máquinas virtuais, containers</li>
                <li>Git, Github</li>
                <ul>

        </div>

        {{-- --}}
        <div class="max-sm:w-96 max-md:w-96 mx-auto p-5 w-1/3 min-h-fit">

            <div class="shadow-md rounded-lg">
                <h3 class="text-center font-bold text-sky-500">Contato</h3>

                <p class="p-4 truncate">
                    Rua, HH <br />
                    Contagem, Minas Gerais, 32113-172+55 <br /> 31 98911-0569 <br />
                    rafaelngoncalves5@outlook.com
                </p>
            </div>
            <br />
            {{-- --}}
            <div class="shadow-md rounded-lg p-4 max-sm:w-96 max-md:w-96 mx-auto">
                <h3 class="text-center font-bold text-sky-500 mb-4">Links</h3>

                <p><strong>GitHub - </strong> <a class="hover:text-sky-500" href="https://github.com/rafaelngoncalves5">rafaelngoncalves5 (Rafael N) (github.com)</a>
                </p>

                <br />
                <p><strong>Linkedin - </strong> <a class="hover:text-sky-500" href="https://www.linkedin.com/in/rafael-n-14b338261/">Rafael N | LinkedIn</a>
                </p>

            </div>
            <br />
            {{-- --}}
            <div class="max-sm:w-96 max-md:w-96 shadow-md rounded-lg p-4 min-h-fit mx-auto">
                <h3 class="text-center font-bold text-sky-500">Idiomas</h3>

                <p><strong>Português - </strong>Nativo</p>

                <br />

                <p><strong>Inglês - </strong>Consigo conduzir conversas de cotidiano, entendo relativamente bem, escrevo relativamente bem e leio bem</p>
            </div>
            <br />

        </div>
    </main>
    {{-- --}}
    <footer class="relative top-6">
        <img src="{{ asset('media/wave3.svg') }}" />
    </footer>

</body>
</html>
