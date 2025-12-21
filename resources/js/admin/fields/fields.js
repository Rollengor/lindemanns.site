import { checkFilling } from "./checkFilling.js";
import { showPassword } from "./showPassword.js";
import { previewImageFile } from "./previewImageFile.js";
import { presetField } from "./presetField.js";
import { dynamicFields } from "./dynamicFields.js";

export function fields() {
    checkFilling();
    showPassword();
    previewImageFile();
    presetField();
    dynamicFields();
}
