const php = @import("php/root.zig");

const Example = struct {
    opaque_ptr: *anyopaque,
};
pub const @"export Example" = php.Class.Custom(Example);

pub fn @"call create"(_: *@This()) !Example {
    return .{ .opaque_ptr = @ptrFromInt(0xDEADBEEF) };
}

pub fn @"call receive"(_: *@This(), args: struct {
    object: *Example,
}) void {
    php.print("opaque_ptr = 0x{X}\n", .{
        @intFromPtr(args.object.opaque_ptr),
    });
}
