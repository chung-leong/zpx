const php = @import("php/root.zig");

pub const @"export somewhere\\out\\there\\ThatClass" = php.Class.Custom(struct {
    pub const @"export Child" = php.Class.Custom(struct {
        pub const @"export Pet" = php.Enum.Custom(enum {
            cat,
            dog,
            rabbit,
            goldfish,
        });
    });
});
