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

module.exports.findMedian = array => {
  array = array.sort((a, b) => a - b);
  return array[Math.floor(array.length / 2)];
};

module.exports.findMode = array => {
  return array
    .sort((a, b) => {
      array.filter(v => v === a).length - array.filter(v => v === b).length;
    })
    .pop();
};
module.exports.findVariance = array => {
  let mean = module.exports.findMean(array);
  var sum = 0;
  array.map(element => {
    return (sum += Math.pow(element - mean, 2));
  });
  return 1 / (array.length - 1) * sum;
};

module.exports.findStandardDeviation = array => {
  return Math.sqrt(module.exports.findVariance(array));
};
