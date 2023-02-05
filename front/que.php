<?php
            $subjects = $News->all(['type' => 1, 'sh'=>1, 'sh'=>1]);
            ?>
            <table>
                <tr>
                    <th style="padding: 10px;">編號</th>
                    <th style="padding: 10px;">標題</th>
                    <th style="padding: 10px;">點閱數</th>
                </tr>
                <?php
                foreach ($subjects as $key => $subject) {
                ?>
                    <tr>
                        <td style="width: 15%;text-align: center">
                            <?= $key + 1; ?>
                        </td>
                        <td style="text-align:left;">
                            <a href="back.php?do=edit_news&id=<?= $subject['id']; ?>" style="text-align:left; width: 30%;text-decoration:none">
                                <?= $subject['title']; ?>
                            </a>
                        </td>
                        <td style="width: 15%;text-align: center">
                        <?= $subject['readed']; ?>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </table>