const php = @import("php/root.zig");

pub const @"export Example" = php.Class.Custom(struct {
    pub fn init(args: struct {
        number1: i32,
        number2: i32,
    }) @This() {
        php.print("init\n", .{});
        return .{ .number1 = args.number1, .number2 = args.number2 };
    }

    number1: i32,
    number2: i32,
});
