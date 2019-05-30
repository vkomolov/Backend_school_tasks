<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>sandbox1</title>
    <link rel="stylesheet" href="./styles/reset.css">
    <link rel="stylesheet" href="./styles/styles.css">
    <script src="./js"></script>
</head>
<body>
    <div class="top-wrapper">
        <h1 class="text_shadowed uppercase">SandBox</h1>
        <h3>PHP Ready:
            <span class="indicate text_shadowed" id="php">
                <?php echo "true" ?>
            </span>
        </h3>
        <h3>JS Connected:
            <span class="indicate text_shadowed" id="js">
                false
            </span>
        </h3>
        <h2 class="text_shadowed uppercase">The Plate</h2>
        <div id="plate">
            <h4>Task 1</h4>
            <p class="task_article">Напишите на РНР программу, вычисляющую общую стоимость трапезы в ресторане,
                состоящей из двух гамбургеров по 4,95 доллара каждый, одного молочно-шоколадного коктейля
                за 1,95 доллара и одной порции кока-колы за 0,85 доллара. Ставка налога на добавленную стоимость
                составляет 7,5%, а чаевые без вычета налогов - 16%.
            </p>
            <div class="flex-box center">
                <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" name="menu-form" id="form-menu">
                    <h3>Please choose Your dishes</h3>
                    <div class="menu-form__inputs-wrapper">
                        <div class="input-block">
                            <input type="checkbox" class="input_check-box"
                                   id="hamburger"
                                   name="hamburger"
                                   value="011"
                            >
                            <label for="hamburger" class="check-box__label">
                                Hamburger
                            </label>
                            <div class="check-box_qnty-block">
                                <label for="hamburger-qnty">
                                    How much???
                                </label>
                                <input type="number" class="input_qnty"
                                       id="hamburger-qnty"
                                       name="hamburger_qnty" maxlength="2"
                                       value="1"
                                >
                            </div>
                        </div>
                        <div class="input-block">
                            <input type="checkbox" class="input_check-box"
                                   id="shake"
                                   name="shake"
                                   value="022"
                            >
                            <label for="shake" class="check-box__label">
                                Shake
                            </label>
                            <div class="check-box_qnty-block">
                                <label for="shake-qnty">
                                    How much???
                                </label>
                                <input type="number" class="input_qnty"
                                       id="shake-qnty"
                                       name="shake_qnty" maxlength="2"
                                       value="1"
                                >
                            </div>
                        </div>
                        <div class="input-block">
                            <input type="checkbox" class="input_check-box"
                                   id="coca-cola"
                                   name="coca-cola"
                                   value="033"
                            >
                            <label for="coca-cola" class="check-box__label">
                                Coca-Cola
                            </label>
                            <div class="check-box_qnty-block">
                                <label for="coca-cola-qnty">
                                    How much???
                                </label>
                                <input type="number" class="input_qnty"
                                       id="coca-cola-qnty"
                                       name="coca-cola_qnty" maxlength="2"
                                       value="1"
                                >
                            </div>
                        </div>
                        <input type="submit" class="submit-button"
                               name="submit" value="Готово">
                    </div>
                </form>
                <?php
                require_once('./php/task_1/index.php');
                print (init_task_1());
                ?>
            </div>
            <h4>Task 2</h4>
            <p class="task_article">Напишите на РНР программу, создающую из массива, содержащего штаты и города с
                количеством населения, таблицу, которая будет сортировать таблицу по штату,
                количеству населения и городам. Вывести в таблице итоговое количество населения каждого штата.
            </p>
            <div class="flex-box center">
                    <?php
                    require_once('./php/task_2/index.php');
                    init_task_2();
                    ?>
            </div>
        </div>
    </div>
</body>
</html>