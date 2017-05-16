module.exports.findSum = array => {
  var sum = 0;
  array.map(value => {
    return (sum += value);
  });
  return sum;
};

module.exports.findMean = array => {
  return module.exports.findSum(array) / array.length;
};

module.exports.findVariance = array => {
    let mean = module.exports.findMean(array);
    var sum = 0;
  array.map((element) => {
    sum+=Math.pow((element-mean),2);
  });
  return((1/(array.length-1))*sum);
};

module.exports.findStandardDeviation = array => {
  return Math.sqrt(module.exports.findVariance(array));
};
