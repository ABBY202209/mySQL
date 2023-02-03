<?php
date_default_timezone_set("Asia/taipei");
session_start();

class DB{
    protected $table;
    protected $pdo;
    protected $dsn="mysql:host=localhost;charset=utf8;dbname=s1110407";
    
    //將分類用成一個陣列
        
    public function __construct($table){
        $this->table=$table;
        // $this->pdo=new PDO($this->dsn,'s1110407','s1110407');
        $this->pdo=new PDO($this->dsn,'root','');
    }

    public function find($id){
        $sql="select * from $this->table";
        if (is_array($id)) {
            # code...
            // foreach ($id as $key => $value) {
            //     # code...
            //     $tmp[]="`$key`='$value'";
            // }
            $tmp=$this->arrayToSqlArray($id);
            $sql=$sql." where ".join(" && ",$tmp);
        }else{
            $sql=$sql." where `id`='$id'";
        }
        return $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
    }
    public function all(...$arg){
        $sql = "select * from $this->table";

        if (isset($arg[0])) { //如果$arg在
            # code...
            if (is_array($arg[0])) { // 而且是個陣列的話...
                # code...
                $tmp = $this->arrayToSqlArray($arg[0]);
                //將陣列串語法
                $sql = $sql . " where " . join(" && ", $tmp);
            } else {
                $sql = $sql . $arg[0]; //不是的話串起來就好了
            }
        }
        if (isset($arg[1])) {
            # code...
            $sql = $sql . $arg[1];
        }
        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC); //fetchAll多筆資料
    }
    public function save($array){
    
        if (isset($array['id'])) {
            # code...
            //更新
            $id = $array['id'];
            unset($array['id']); //將id從陣列中拿走
            $tmp = $this->arrayToSqlArray($array);
            $sql = "update $this->table set " . join(",", $tmp) . "  where `id`='$id'";
        } else {
            //新增
            $cols = array_keys($array);
            $sql = "insert into $this->table(`" . join("`,`", $cols) . "`) values('" . join("','", $array) . "')";
        }
        echo $sql;
        $this->pdo->exec($sql);
    }
    public function del($id){
        $sql = "delete from $this->table";

        //判斷式：參數檢查
        if (is_array($id)) { //如果這個參數是陣列的話
            # code...
            $tmp = $this->arrayToSqlArray($id); //執行funtion；也可以直接將下面的$tmp改成arrayToSqlArray($id)

            $sql = $sql . " where " . join(" && ", $tmp); //用join把資料串起來 join合併查詢
        } else {
            $sql = $sql . " where `id`='$id'";
        }

        return $this->pdo->exec($sql);
    }
    public function count(...$arg){
        return $this->math('count',...$arg);//...$arg 此處為解構賦值
    }
    public function sum($col,...$arg){
        return $this->math('sum',$col,...$arg);//...$arg 此處為解構賦值
    }public function max($col,...$arg){
        return $this->math('max',$col,...$arg);
    }
    public function min($col,...$arg){
        return $this->math('min',$col,...$arg);//...$arg 此處為解構賦值
    }
    public function avg($col,...$arg){
        return $this->math('avg',$col,...$arg);//...$arg 此處為解構賦值
    }

    private function arrayToSqlArray($array){
        foreach ($array as $key => $value) {
            # code...
            $tmp[]="`$key`='$value'";
        }
        return $tmp;
    }
    //math 設private 和 public均可
    private function math($math,...$arg){
        switch ($math) {
            case 'count':
                # code...
                $sql="select count(*) from $this->table";
                if (isset($arg[0])) {
                    # code...
                    $con=$arg[0];
                }
                break;
            
            default:
                # code...
                $col=$arg[0];
                if (isset($arg[1])) {
                    # code...
                    $con=$arg[1];
                }
                $sql="select $math($col) from $this->table";

                break;
        }

        if(isset($con)){
            if (is_array($con)) {
                # code...
                $tmp=$this->arrayToSqlArray($con);
                $sql=$sql . " where " . join(" && ",$tmp);

            }else{
                $sql=$sql . $con;
            }
        }
       
        return $this->pdo->query($sql)->fetchColumn();
    }
}
 


function to($url){
    header("location:".$url);
}
function dd($array){
   echo "<pre>";
   print_r($array);
   echo "</pre>";
}
function q($sql){
    $dsn = "mysql:host=localhost;charset=utf8;dbname=db07q2";
    $pdo = new PDO($dsn, 'root', '');
    //echo $sql;
    return $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC); 
}

$Total=new DB('total');
$User=new DB('user');
$News=new DB('news');
$Que=new DB('que');
$Log=new DB('log');

if (!isset($_SESSION['total'])) {
    # code...
    $today=$Total->find(['date'=>date("Y-m-d")]);
    if (empty($today)) {
        # code...
        // 沒有今天的資料->新增
        $today=['date'=>date("Y-m-d"),'total'=>1];
    }else{
        $today['total']++;
    }
    $Total->save($today);
    $_SESSION['total']=1;
}

