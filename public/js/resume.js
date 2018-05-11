
    $().ready(function(){
        $('#name').keypress(function(e){
            if(validElem(e.which)){
                $('#name').val('');
                $('#name').css({"border": "1px dotted red"});
                return false;
            }
            else $('#name').css({"border": "inherit "});
        });

        $('#salary').keypress(function(e){
                    if(validElem(e.which)){
                        $('#salary').css({"border": "inherit "});
                    }
                    else {
                        $('#salary').val('');
                        $('#salary').css({"border": "1px dotted red"});
                        return false;
                    }
                });

        $('#salary_max').keypress(function(e){
                    if(validElem(e.which)){
                        $('#salary_max').css({"border": "inherit "});
                    }
                    else {
                        $('#salary_max').val('');
                        $('#salary_max').css({"border": "1px dotted red"});
                        return false;
                    }
                });

    });


    function validElem(el) {
        if(el ==48 ||el ==49 || el ==50 || el ==51|| el ==52|| el ==53|| el ==54|| el ==55|| el ==56|| el ==57){
            return true;
        }
        else return false;
    }
