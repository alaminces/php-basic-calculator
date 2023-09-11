<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PHP Form Validation</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>
  <div class="container mt-5">
  <div class="border border-3 border-primary rounded pt-5 bg-info shadow-lg">
    <h2 class="text-center text-white mb-4">গাণিতিক ফলাফল নির্ণয়ের ক্যালকুলেটর</h2>
    <div class="row">
      <div class="col-md-3"></div>
      <div class="col-md-6">
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
          <h4><label for="n1">প্রথম নাম্বার :</label></h4>
          <input type="number" name="number1" id="n1" class="form-control mt-2 mb-4">
          <h4><label for="n2">দ্বিতীয় নাম্বার :</label></h4>
          <input type="number" name="number2" id="n2" class="form-control mt-2 mb-4">
          <select name="operator" class="form-control mb-5">
            <option disabled selected>যেকোনো একটি অপারেটর নির্বাচন করুন</option>
            <option value="+">( + ) যোগ</option>
            <option value="-">( - ) বিয়োগ</option>
            <option value="*">( x ) গুণ</option>
            <option value="/">( / ) ভাগ</option>
            <option value="binary">বাইনারী কনভারশন</option>
            <option value="hexadecimal">হেক্সাডেসিম্যাল কনভারশন</option>
            <option value="octal">অক্টাল কনভারশন</option>
          </select>
          <input type="submit" class="btn btn-primary d-block m-auto" value="ফলাফল দেখুন">
        </form>
      </div>
    </div>

    <div class="row mt-5">
      <div class="col-md-3"></div>
      <div class="col-md-6">
        <h3 class="text-center pb-4 text-success">
          <?php 
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
              $number1 = $_POST['number1'];
              $number2 = $_POST['number2'];
              $operator = $_POST['operator'] ?? "";
            
              switch($operator) {
                case "+" :
                  echo "যোগফল : ". ($number1+$number2);
                  break;
                case "-" :
                  echo "বিয়োগফল : ". ($number1-$number2);
                  break;
                case "*" :
                  echo "গুণফল : ". ($number1*$number2);
                  break;
                case "/" :
                  if ($number2 != 0) {
                    echo "ভাগফল : ". $number1 / $number2;
                  }else{
                    echo "<span class='text-danger'>আপনি 0 দিয়ে ভাগ করতে পারবেন না!</span>";
                  }
                  break;
                case "binary":
                  echo "বাইনারী নাম্বার : ". decbin($number1);
                  break;
                case "hexadecimal" :
                  echo "হেক্সাডেসিম্যাল নাম্বার : ". dechex($number1);
                  break;
                case "octal" :
                  echo "অক্টাল নাম্বার : ". decoct($number1);
                  break;
                default:
                  echo "<span class='text-danger'>অনুগ্রহ করে আবার চেক করুন</span>";
              }
            }
          ?>

        </h3>
      </div>
    </div>
  </div>


    
  </div>




  <!-- bootstrap script link  -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>