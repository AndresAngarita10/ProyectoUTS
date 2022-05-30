
            <title>Procesando...</title>
                            <script type='text/javascript'>
                                function enviarForm(){
                                    document.form.submit();
                                }
                            </script>
                            </head>
                            <body onLoad='javascript:enviarForm();'>
                                <form name='form' action='../../controlador/paciente/PacienteControl.php' method='post'>
                                    <input type='text' hidden id="boton" name='boton' value='null'/>
                                </form>
                            </body>
