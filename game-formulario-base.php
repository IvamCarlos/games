            <tr>
                <td>Nome</td>
                <td><input class="form-control" type="text" name="nome" value="<?=$game['nome']?>" required></td>
            </tr>
            <tr>
                <td>Gênero</td>
                      <td>
                    <select name="genero_id" class="form-control" required>
                    <?php foreach($generos as $genero) : 
                        $essaEhOGenero = $game['genero_id'] == $genero['id'];
                        $selecao = $essaEhOGenero ? "selected='selected'" : "";
                        ?>
                        <option value="<?=$genero['id']?>" <?=$selecao?>>
                                <?= utf8_encode($genero['genero']) ?>
                        </option>
                    <?php endforeach ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Descrição</td>
                <td><textarea class="form-control" name="descricao"><?=$game['descricao']?></textarea></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="checkbox" name="status" <?=$status?> value="true"> Terminou o jogo?</td>
            </tr>
            <tr>
                <td>Plataforma</td>
                <td>
                    <select name="plataforma_id" class="form-control" required>
                    <?php foreach($plataformas as $plataforma) : 
                        $essaEhAPlataforma = $game['plataforma_id'] == $plataforma['id'];
                        $selecao = $essaEhAPlataforma ? "selected='selected'" : "";
                        ?>
                        <option value="<?=$plataforma['id']?>" <?=$selecao?>>
                                <?= $plataforma['plataforma'] ?>
                        </option>
                    <?php endforeach ?>
                    </select>
                </td>
            </tr>