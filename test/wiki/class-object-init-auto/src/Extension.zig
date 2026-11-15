const php = @import("php/root.zig");

pub const @"export Example" = php.Class.Custom(struct {
    pub const @"use auto getters" = true;
    pub const @"use auto setters" = true;

    number1: i32 = 0,
    number2: i32 = 0,
});
