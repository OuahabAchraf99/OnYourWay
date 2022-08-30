<?php
function pourcPoid($p)
{
    if     ($p === "XS"){return 0.2 ;}
    elseif ($p === "S"){return 0.3 ;}
    elseif ($p === "M"){return 0.5 ;}
    elseif ($p === "L"){return 0.8 ;}
    elseif ($p === "XL"){return 1 ;}
}
function pourcTaille($t)
{
    if     ($t === "T.Léger"){return 0.2 ;}
    elseif ($t === "Léger"){return 0.5 ;}
    elseif ($t === "Lourd"){return 0.75 ;}
    elseif ($t === "T.Lourd"){return 1 ;}
}

?>