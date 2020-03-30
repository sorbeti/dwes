<table align="center">
    <tr>
        <th></th>
        <th>Nombre Prueba</th>
        <th>Descripción</th>
        <th>Tipo</th>
        <th>Usuario que la creó</th>
    </tr>
    {foreach from=$pruebas item=prueba}
        <tr>
            <td>
                <input type="radio" name="pru_id" value={$prueba->getid()}>
            </td>
            <td>{$prueba->getnombre()}</td>
            <td>{$prueba->getdescBreve()}</td>
            <td>{$prueba->gettipo()}</td>
            <td>{$prueba->getusername()}</td>
        </tr>
    {/foreach}
</table>
