const php = @import("php/root.zig");

pub const @"export Example" = php.Class.Custom(struct {
    pub const @"use auto getters" = true;
    pub const @"use auto setters" = true;

    text: []const u8 = "Default text",
});
