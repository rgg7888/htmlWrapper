# htmlWrapper

<h1>El wrapper</h1>

<pre>
page (array $settings = [
    'idioma' => 'en',
    'head' => [],
    'body' => [
        'contenido' => [],
        'atributos' => []
    ]
]);
</pre>

<p>
La funcion que observa arriba es el 
valor por default que se le pasa al
constructor del mecanismo html-armor
</p>

<p>
Los valores que usted debera proporcionar
al template wrapper son :
</p>

<ul>
    <li>el idioma</li>
    <li>las etiquetas que iran dentro del head</li>
    <li>las etiquetas que iran dentro del body</li>
    <li>opcionalmente agregarle atributos al body</li>
</ul>