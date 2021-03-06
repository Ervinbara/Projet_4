import { Obj, Result } from '@ephox/katamari';

import * as Objects from '../api/Objects';
import { typeAdt, FieldProcessorAdt } from '../format/TypeTokens';
import { missingBranch, missingKey } from './SchemaError';
import * as ValueProcessor from './ValueProcessor';

const chooseFrom = function (path, strength, input, branches, ch) {
  const fields = Objects.readOptFrom<FieldProcessorAdt[]>(branches, ch);
  return fields.fold(function () {
    return missingBranch(path, branches, ch);
  }, function (fs) {
    return ValueProcessor.objOf(fs).extract(path.concat([ 'branch: ' + ch ]), strength, input);
  });
};

// The purpose of choose is to have a key which picks which of the schemas to follow.
// The key will index into the object of schemas: branches
const choose = function (key, branches) {
  const extract = function (path, strength, input) {
    const choice = Objects.readOptFrom(input, key);
    return choice.fold(function () {
      return missingKey(path, key);
    }, function (chosen) {
      return chooseFrom(path, strength, input, branches, chosen);
    });
  };

  const toString = function () {
    return 'chooseOn(' + key + '). Possible values: ' + Obj.keys(branches);
  };

  const toDsl = function () {
    return typeAdt.choiceOf(key, branches);
  };

  return {
    extract,
    toString,
    toDsl
  };
};

export {
  choose
};