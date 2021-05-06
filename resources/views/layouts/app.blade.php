<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{'Sistema De Compras'}}</title>
        <!-- Favicon -->
        <link href="{{ asset('argon') }}/img/brand/favicon.png" rel="icon" type="image/png">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
        <!-- Icons -->
        <link href="{{ asset('argon') }}/vendor/nucleo/css/nucleo.css" rel="stylesheet">
        <link href="{{ asset('argon') }}/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
        <!-- Argon CSS -->
        <link type="text/css" href="{{ asset('argon') }}/css/argon.css?v=1.0.0" rel="stylesheet">
    </head>
    <body class="{{ $class ?? '' }}">
        @auth()
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            @include('layouts.navbars.sidebar')
        @endauth
        
        <div class="main-content">
            @include('layouts.navbars.navbar')
            @yield('content')
        </div>

        @guest()
            @include('layouts.footers.guest')
        @endguest

        <script src="{{ asset('argon') }}/vendor/jquery/dist/jquery.min.js"></script>
        <script src="{{ asset('argon') }}/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
        
        @stack('js')
        
        <!-- Argon JS -->
        <script src="{{ asset('argon') }}/js/argon.js?v=1.0.0"></script>
        <script type="text/javascript">
            function is_cpf (c) {

                if((c = c.replace(/[^\d]/g,"")).length != 11)
                return false

                if (c == "00000000000")
                return false;

                var r;
                var s = 0;

                for (i=1; i<=9; i++)
                s = s + parseInt(c[i-1]) * (11 - i);

                r = (s * 10) % 11;

                if ((r == 10) || (r == 11))
                r = 0;

                if (r != parseInt(c[9]))
                return false;

                s = 0;

                for (i = 1; i <= 10; i++)
                s = s + parseInt(c[i-1]) * (12 - i);

                r = (s * 10) % 11;

                if ((r == 10) || (r == 11))
                r = 0;

                if (r != parseInt(c[10]))
                return false;

                return true;
                }


                function fMasc(objeto,mascara) {
                obj=objeto
                masc=mascara
                setTimeout("fMascEx()",1)
                }

                function fMascEx() {
                obj.value=masc(obj.value)
                }

                function mCPF(cpf){
                cpf=cpf.replace(/\D/g,"")
                cpf=cpf.replace(/(\d{3})(\d)/,"$1.$2")
                cpf=cpf.replace(/(\d{3})(\d)/,"$1.$2")
                cpf=cpf.replace(/(\d{3})(\d{1,2})$/,"$1-$2")
                return cpf
                }

                cpfCheck = function (el) {
                    var retorno = is_cpf(el.value);
                    document.getElementById('cpfResponse').innerHTML = is_cpf(el.value)? '<span style="color:green">válido</span>' : '<span style="color:red">inválido</span>';
                    el.setCustomValidity("");
                    if(el.value=='') document.getElementById('cpfResponse').innerHTML = '';
                    
                    
                    if( retorno ==false){
				        el.setCustomValidity('CPF Inválido!');
				        //alert('tt');
			        }
                    
                }
                function is_cnpj (cnpj) {

                    cnpj = cnpj.replace(/[^\d]+/g,'');
 
                    if(cnpj == '') return false;
                    
                    if (cnpj.length != 14)
                        return false;

                    // Elimina CNPJs invalidos conhecidos
                    if (cnpj == "00000000000000" || 
                        cnpj == "11111111111111" || 
                        cnpj == "22222222222222" || 
                        cnpj == "33333333333333" || 
                        cnpj == "44444444444444" || 
                        cnpj == "55555555555555" || 
                        cnpj == "66666666666666" || 
                        cnpj == "77777777777777" || 
                        cnpj == "88888888888888" || 
                        cnpj == "99999999999999")
                        return false;
                        
                    // Valida DVs
                    tamanho = cnpj.length - 2
                    numeros = cnpj.substring(0,tamanho);
                    digitos = cnpj.substring(tamanho);
                    soma = 0;
                    pos = tamanho - 7;
                    for (i = tamanho; i >= 1; i--) {
                    soma += numeros.charAt(tamanho - i) * pos--;
                    if (pos < 2)
                            pos = 9;
                    }
                    resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
                    if (resultado != digitos.charAt(0))
                        return false;
                        
                    tamanho = tamanho + 1;
                    numeros = cnpj.substring(0,tamanho);
                    soma = 0;
                    pos = tamanho - 7;
                    for (i = tamanho; i >= 1; i--) {
                    soma += numeros.charAt(tamanho - i) * pos--;
                    if (pos < 2)
                            pos = 9;
                    }
                    resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
                    if (resultado != digitos.charAt(1))
                        return false;
                            
                    return true;
                }


                function fMasc(objeto,mascara) {
                    obj=objeto
                    masc=mascara
                    setTimeout("fMascEx()",1)
                }

                function fMascEx() {
                    obj.value=masc(obj.value)
                }

                function mCNPJ(v){
                    v=v.replace(/\D/g,"")                           //Remove tudo o que não é dígito
                    v=v.replace(/^(\d{2})(\d)/,"$1.$2")             //Coloca ponto entre o segundo e o terceiro dígitos
                    v=v.replace(/^(\d{2})\.(\d{3})(\d)/,"$1.$2.$3") //Coloca ponto entre o quinto e o sexto dígitos
                    v=v.replace(/\.(\d{3})(\d)/,".$1/$2")           //Coloca uma barra entre o oitavo e o nono dígitos
                    v=v.replace(/(\d{4})(\d)/,"$1-$2")              //Coloca um hífen depois do bloco de quatro dígitos
                    return v
                }

                cnpjCheck = function (el) {
                    var retorno = is_cnpj(el.value);
                    document.getElementById('cnpjResponse').innerHTML = is_cnpj(el.value)? '<span style="color:green">válido</span>' : '<span style="color:red">inválido</span>';
                    el.setCustomValidity("");
                    if(el.value=='') document.getElementById('cnpjResponse').innerHTML = '';
                    if(retorno ==false){
                        el.setCustomValidity('CNPJ inválido!');
                   }
                }
                function mask(o, f) {
                    setTimeout(function() {
                        var v = mphone(o.value);
                        if (v != o.value) {
                        o.value = v;
                        }
                    }, 1);
                    }

                function mphone(v) {
                var r = v.replace(/\D/g, "");
                r = r.replace(/^0/, "");
                if (r.length > 10) {
                    r = r.replace(/^(\d\d)(\d{5})(\d{4}).*/, "($1) $2-$3");
                } else if (r.length > 5) {
                    r = r.replace(/^(\d\d)(\d{4})(\d{0,4}).*/, "($1) $2-$3");
                } else if (r.length > 2) {
                    r = r.replace(/^(\d\d)(\d{0,5})/, "($1) $2");
                } else {
                    r = r.replace(/^(\d*)/, "($1");
                }
                return r;
                }
                function limpa_formulário_cep() {
                    //Limpa valores do formulário de cep.
                    document.getElementById('endereco').value=("");
                    document.getElementById('bairro').value=("");
                    document.getElementById('cidade').value=("");
                    document.getElementById('uf').value=("");
                    
            }

            function meu_callback(conteudo) {
                if (!("erro" in conteudo)) {
                    //Atualiza os campos com os valores.
                    document.getElementById('endereco').value=(conteudo.logradouro);
                    document.getElementById('bairro').value=(conteudo.bairro);
                    document.getElementById('cidade').value=(conteudo.localidade);
                    document.getElementById('uf').value=(conteudo.uf);
                    document.getElementById('cep').value=(conteudo.cep);
                   
                } //end if.
                else {
                    //CEP não Encontrado.
                    limpa_formulário_cep();
                    document.getElementById('cepResponse').innerHTML =  '<span style="color:red">CEP não Encotrado</span>';
                }
            }

            function pesquisacep(valor) {

                //Nova variável "cep" somente com dígitos.
                var cep = valor.replace(/\D/g, '');

                //Verifica se campo cep possui valor informado.
                if (cep != "") {

                    //Expressão regular para validar o CEP.
                    var validacep = /^[0-9]{8}$/;

                    //Valida o formato do CEP.
                    if(validacep.test(cep)) {

                        document.getElementById('cep').value = 'cep.substring(0,5)'
                        +"-"
                        +cep.substring(5);

                        //Preenche os campos com "..." enquanto consulta webservice.
                        document.getElementById('endereco').value="...";
                        document.getElementById('bairro').value="...";
                        document.getElementById('cidade').value="...";
                        document.getElementById('uf').value="...";
                        

                        //Cria um elemento javascript.
                        var script = document.createElement('script');

                        //Sincroniza com o callback.
                        script.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';

                        //Insere script no documento e carrega o conteúdo.
                        document.body.appendChild(script);

                    } //end if.
                    else {
                        //cep é inválido.
                        limpa_formulário_cep();
                        document.getElementById('cepResponse').innerHTML =  '<span style="color:red">Formato do CEP inválido</span>';
                    }
                } //end if.
                else {
                    //cep sem valor, limpa formulário.
                    limpa_formulário_cep();
                }
            };
        </script>
    </body>
</html>