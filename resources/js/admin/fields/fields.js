import { checkFilling } from "./checkFilling.js";
import { showPassword } from "./showPassword.js";
import { previewImageFile } from "./previewImageFile.js";
import { presetField } from "./presetField.js";

export function fields() {
    checkFilling();
    showPassword();
    previewImageFile();
    presetField();
}
